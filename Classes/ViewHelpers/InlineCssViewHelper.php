<?php

namespace WebentwicklerAt\Emogrifier\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;
use WebentwicklerAt\Emogrifier\Utility\EmogrifierUtility;

class InlineCssViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    /**
     * @var bool
     */
    protected $escapeChildren = false;

    /**
     * @var bool
     */
    protected $escapeOutput = false;

    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('path', 'string', 'The path and filename of the resource file.', true);
        $this->registerArgument('addStyleTag', 'bool', 'Wrap css with style tags.', false, false);
    }

    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ): string
    {
        $cssFile = $arguments['path'];
        $cssContents = EmogrifierUtility::getCssContents($cssFile);
        return ($arguments['addStyleTag'] ? '<style>' . $cssContents . '</style>' : $cssContents);
    }
}
