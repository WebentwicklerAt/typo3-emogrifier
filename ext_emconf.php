<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Emogrifier',
    'description' => 'Converts CSS styles into inline HTML styles.',
    'category' => 'fe',
    'clearCacheOnLoad' => true,
    'version' => '5.0.0',
    'state' => 'stable',
    'author' => 'Gernot Leitgab',
    'author_company' => 'Webentwickler.at',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-11.5.99',
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
