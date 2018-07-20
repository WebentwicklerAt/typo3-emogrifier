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
                $pharPath = PATH_site . 'typo3conf/ext/emogrifier/Resources/Private/Php/Emogrifier.phar';
                require_once $pharPath;
                require_once 'phar://' . $pharPath . '/vendor/autoload.php';
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
