<?php
defined('TYPO3_MODE') or die();

$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects'] = array_merge($GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects'], [
    'EMOGRIFIER' => \WebentwicklerAt\Emogrifier\ContentObject\EmogrifierContentObject::class
]);
