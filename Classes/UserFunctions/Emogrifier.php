<?php

namespace WebentwicklerAt\Emogrifier\UserFunctions;

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

use Symfony\Component\CssSelector\Exception\ParseException;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use WebentwicklerAt\Emogrifier\Utility\EmogrifierUtility;

class Emogrifier
{
    /**
     * @param string $content
     * @param array $typoScript
     * @return string
     * @throws ParseException
     */
    public function emogrify($content, array $typoScript)
    {
        $css = null;

        if (array_key_exists('css', $typoScript) && array_key_exists('css.', $typoScript)) {
            $contentObject = $this->getContentObject();
            $css = $contentObject->cObjGetSingle($typoScript['css'], $typoScript['css.']);
        }
        $extractContent = (array_key_exists('extractContent', $typoScript) && $typoScript['extractContent']);

        $options = [];
        if (array_key_exists('options.', $typoScript) && is_array($typoScript['options.'])) {
            $options = $typoScript['options.'];
        }

        return EmogrifierUtility::emogrify($content, $css, $extractContent, $options);
    }

    /**
     * @return ContentObjectRenderer
     */
    protected function getContentObject()
    {
        return $GLOBALS['TSFE']->cObj;
    }
}
