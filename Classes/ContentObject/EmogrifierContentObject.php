<?php

namespace WebentwicklerAt\Emogrifier\ContentObject;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Frontend\ContentObject\AbstractContentObject;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use WebentwicklerAt\Emogrifier\Utility\EmogrifierUtility;

class EmogrifierContentObject extends AbstractContentObject
{

    public function render($conf = [])
    {
        $content = $css = null;

        if (array_key_exists('html', $conf) && array_key_exists('html.', $conf)) {
            $content = $this->cObj->cObjGetSingle($conf['html'], $conf['html.']);
        }

        if (array_key_exists('css', $conf) && array_key_exists('css.', $conf)) {
            $css = $this->cObj->cObjGetSingle($conf['css'], $conf['css.']);
        }
        $extractContent = (array_key_exists('extractContent', $conf) && $conf['extractContent']);


        /** @var TypoScriptFrontendController $controller */
        $controller = $GLOBALS['TSFE'];
        /** @var ServerRequestInterface $request */
        $request = $GLOBALS['TYPO3_REQUEST'];

        // Render non-cached page parts by replacing placeholders which are taken from cache or added during page generation
        if ($controller->isINTincScript()) {
            if (!$controller->isGeneratePage()) {
                // When page was generated, this was already called. Avoid calling this twice.
                $controller->preparePageContentGeneration($request);
            }
            $contentBak = $controller->content;
            $controller->content = $content;
            $controller->INTincScript();
            $content = $controller->content;
            $controller->content = $contentBak;
            unset($contentBak);
        }

        $options = [];
        if (array_key_exists('options.', $conf) && is_array($conf['options.'])) {
            $options = $conf['options.'];
        }

        return EmogrifierUtility::emogrify($content, $css, $extractContent, $options);
    }
}
