<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Emogrifier',
    'description' => 'Converts CSS styles into inline HTML styles.',
    'category' => 'fe',
    'clearCacheOnLoad' => true,
    'version' => '6.1.0',
    'state' => 'stable',
    'author' => 'Gernot Leitgab',
    'author_company' => 'Webentwickler.at',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-12.4.99',
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
