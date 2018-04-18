<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(function ($_EXTKEY) {
    if (TYPO3_MODE === 'FE') {
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_content.php']['cObjTypeAndClass'][$_EXTKEY] = [
            'EMOGRIFIER',
            \WebentwicklerAt\Emogrifier\Hooks\ContentObjectHook::class
        ];
    }
}, $_EXTKEY);
