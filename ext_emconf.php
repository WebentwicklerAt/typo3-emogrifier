<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Emogrifier',
    'description' => 'Converts CSS styles into inline HTML styles.',
    'category' => 'fe',
    'clearCacheOnLoad' => true,
    'version' => '13.0.0',
    'state' => 'stable',
    'author' => 'Gernot Leitgab',
    'author_company' => 'Webentwickler.at',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'WebentwicklerAt\\Emogrifier\\' => 'Classes'
        ]
    ],
];
