<?php

namespace WebentwicklerAt\Emogrifier\Utility;

/*
 * This file is part of the Emogrifier extension for TYPO3 CMS.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use BK2K\BootstrapPackage\Service\CompileService;
use Pelago\Emogrifier\CssInliner;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Http\ServerRequest;
use TYPO3\CMS\Core\Http\ServerRequestFactory;
use TYPO3\CMS\Core\TypoScript\AST\Node\RootNode;
use TYPO3\CMS\Core\TypoScript\FrontendTypoScript;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class EmogrifierUtility
{
    public static function getCssContents(string $cssFile): ?string
    {
        if (
            ExtensionManagementUtility::isLoaded('bootstrap_package')
            && class_exists(CompileService::class)
        ) {
            $compileService = GeneralUtility::makeInstance(CompileService::class);
            $request = self::getRequest();
            $cssFile = $compileService->getCompiledFile($request, $cssFile);
        }
        $path = GeneralUtility::getFileAbsFileName($cssFile);
        $css = GeneralUtility::getUrl($path);
        return is_string($css) ? $css : null;
    }

    public static function emogrify(?string $content, ?string $cssFile, ?string $css, bool $extractContent, array $options = []): string
    {
        if ($content !== null && ($cssFile !== null || $css !== null)) {
            $cssInliner = CssInliner::fromHtml($content);
            if (!empty($options['disableStyleBlocksParsing'])) {
                $cssInliner = $cssInliner->disableStyleBlocksParsing();
            }
            if (!empty($options['disableInlineStyleAttributesParsing'])) {
                $cssInliner = $cssInliner->disableInlineStyleAttributesParsing();
            }
            if (!empty($options['addAllowedMediaType'])) {
                $cssInliner = $cssInliner->addAllowedMediaType($options['addAllowedMediaType']);
            }
            if (!empty($options['removeAllowedMediaType'])) {
                $cssInliner = $cssInliner->removeAllowedMediaType($options['removeAllowedMediaType']);
            }
            if (!empty($options['addExcludedSelector'])) {
                $cssInliner = $cssInliner->addExcludedSelector($options['addExcludedSelector']);
            }
            if ($cssFile) {
                $cssContents = (string)self::getCssContents($cssFile);
                $css = $cssContents . $css;
            }
            $content = $cssInliner->inlineCss($css)->render();

            if ($extractContent) {
                $content = preg_replace('/^.*<body[^>]*>(.*?)<\/body>.*$/sU', '$1', $content);
            }
        }

        return $content;
    }

    protected static function getServerRequest(): ServerRequest
    {
        return $GLOBALS['TYPO3_REQUEST'] ?? ServerRequestFactory::fromGlobals();
    }

    protected static function getRequest(): ServerRequestInterface
    {
        $request = self::getServerRequest();
        $setupTree = new RootNode();
        $setupArray = [];
        /** @var FrontendTypoScript $frontendTypoScript */
        $frontendTypoScript = GeneralUtility::makeInstance(
            FrontendTypoScript::class,
            $setupTree,
            $setupArray,
        );
        $frontendTypoScript->setSetupArray([]);
        $request = $request->withAttribute('frontend.typoscript', $frontendTypoScript);
        return $request;
    }
}

