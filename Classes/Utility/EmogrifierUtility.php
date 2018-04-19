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

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class EmogrifierUtility
{
    /**
     * @param string $content
     * @param string $css
     * @return string
     */
    public static function emogrify($content, $css)
    {
        if ($content !== null && $css !== null) {
            if (!class_exists('\\Pelago\\Emogrifier')) {
                $pharPath = ExtensionManagementUtility::extPath(
                    'emogrifier',
                    'Resources/Private/Php/Emogrifier.phar/vendor/autoload.php'
                );
                GeneralUtility::requireOnce('phar://' . $pharPath);
            }
            $emogrifier = new \Pelago\Emogrifier($content, $css);
            $content = $emogrifier->emogrify();
        }

        return $content;
    }
}
