<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Emogrifier',
    'description' => 'Converts CSS styles into inline HTML styles.',
    'category' => 'fe',
    'version' => '2.0.0',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'author' => 'Gernot Leitgab',
    'author_company' => 'Webentwickler.at',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'WebentwicklerAt\\Emogrifier\\' => 'Classes/',
        ],
    ],
];
