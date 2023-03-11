<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(function ($_EXTKEY) {
    if (!defined('TYPO3_COMPOSER_MODE') || !TYPO3_COMPOSER_MODE) {
        require \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('emogrifier') . '/vendor/autoload.php';
    }
    if (TYPO3_MODE === 'FE') {
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_content.php']['cObjTypeAndClass'][$_EXTKEY] = [
            'EMOGRIFIER',
            \WebentwicklerAt\Emogrifier\Hooks\ContentObjectHook::class
        ];
    }
}, $_EXTKEY);
