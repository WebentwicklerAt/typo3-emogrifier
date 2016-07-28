<?php
namespace WebentwicklerAt\Emogrifier\Hooks;

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

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use Pelago\Emogrifier;

class ContentObjectHook {
	/**
	 * @param string $typoScriptObjectName Name of the object
	 * @param array $typoScript TS configuration for this cObject
	 * @param string $typoScriptKey A string label used for the internal debugging tracking.
	 * @param ContentObjectRenderer $contentObject reference
	 * @return string HTML output
	 */
	public function cObjGetSingleExt($typoScriptObjectName, array $typoScript, $typoScriptKey, ContentObjectRenderer $contentObject) {
		$content = '';

		if ($typoScriptObjectName === 'EMOGRIFIER') {
			$content = $css = null;

			if (array_key_exists('html', $typoScript) && array_key_exists('html.', $typoScript)) {
				$content = $contentObject->cObjGetSingle($typoScript['html'], $typoScript['html.']);
			}

			if (array_key_exists('css', $typoScript) && array_key_exists('css.', $typoScript)) {
				$css = $contentObject->cObjGetSingle($typoScript['css'], $typoScript['css.']);
			}

			if ($content !== null && $css !== null) {
				$emogrifier = new Emogrifier($content, $css);
				$content = $emogrifier->emogrify();
			}
		}

		return $content;
	}
}
