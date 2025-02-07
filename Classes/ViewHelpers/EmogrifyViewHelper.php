<?php

namespace WebentwicklerAt\Emogrifier\ViewHelpers;

use Symfony\Component\CssSelector\Exception\ParseException;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Exception;
use WebentwicklerAt\Emogrifier\Utility\EmogrifierUtility;

class EmogrifyViewHelper extends AbstractViewHelper
{
    /**
     * @var bool
     */
    protected $escapeOutput = false;

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('cssFile', 'string', 'Path to (S)CSS file.');
        $this->registerArgument('css', 'string', 'CSS as a string.');
        $this->registerArgument('extractContent', 'bool', 'Extract emogrified content from within body tags.', false, false);
        $this->registerArgument('options', 'array', 'CSS inliner options.', false, []);
    }

    public function render(): string
    {
        $content = $this->renderChildren();
        $cssFile = $this->arguments['cssFile'];
        $css = $this->arguments['css'];
        $extractContent = $this->arguments['extractContent'];
        $options = $this->arguments['options'];

        $output = EmogrifierUtility::emogrify($content, $cssFile, $css, $extractContent, $options);

        return $output;
    }

    protected static function getContentObject(): ContentObjectRenderer
    {
        return $GLOBALS['TSFE']->cObj;
    }
}
