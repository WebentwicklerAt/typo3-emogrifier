<?php

namespace WebentwicklerAt\Emogrifier\ViewHelpers;

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use WebentwicklerAt\Emogrifier\Utility\EmogrifierUtility;

class EmogrifyViewHelper extends AbstractViewHelper
{
    /**
     * @var bool
     */
    protected $escapeOutput = false;

    /**
     * Initialize arguments.
     *
     * @throws \TYPO3Fluid\Fluid\Core\ViewHelper\Exception
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('css', 'string', 'CSS as a string.');
        $this->registerArgument('extractContent', 'bool', 'Extract emogrified content from within body tags.', false, false);
        $this->registerArgument('options', 'array', 'CSS inliner options.', false, []);
    }

    /**
     * @return string
     */
    public function render()
    {
        $content = $this->renderChildren();
        $css = $this->arguments['css'];
        $extractContent = $this->arguments['extractContent'];
        $options = $this->arguments['options'];

        $output = EmogrifierUtility::emogrify($content, $css, $extractContent, $options);

        return $output;
    }

    /**
     * @return ContentObjectRenderer
     */
    protected static function getContentObject()
    {
        return $GLOBALS['TSFE']->cObj;
    }
}
