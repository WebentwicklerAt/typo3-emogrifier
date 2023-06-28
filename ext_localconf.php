<?php
defined('TYPO3') or die("Access denied.");

//Add ContentObjects only for TYPO3 < 12, because TYPO3 12 has a new way to register ContentObjects
$versionInformation = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Information\Typo3Version::class);
if ($versionInformation->getMajorVersion() < 12) {
    $GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects'] = array_merge($GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects'], [
        'EMOGRIFIER' => \WebentwicklerAt\Emogrifier\ContentObject\EmogrifierContentObject::class
    ]);
}
