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

class EmogrifierUtility
{
    /**
     * @param string $content
     * @param string $css
     * @param bool $extractContent
     * @return string
     */
    public static function emogrify($content, $css, $extractContent)
    {
        if ($content !== null && $css !== null) {
            if (!class_exists('\\Pelago\\Emogrifier')) {
                $pharPath = ExtensionManagementUtility::extPath(
                    'emogrifier',
                    'Resources/Private/Php/Emogrifier.phar/vendor/autoload.php'
                );
                require_once 'phar://' . $pharPath;
            }
            $emogrifier = new \Pelago\Emogrifier($content, $css);
            $content = $emogrifier->emogrify();

            if ($extractContent) {
                $content = preg_replace('/^.*<body[^>]*>(.*?)<\/body>.*$/sU', '$1', $content);
            }
        }

        return $content;
    }
}
