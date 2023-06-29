<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Emogrifier',
    'description' => 'Converts CSS styles into inline HTML styles.',
    'category' => 'fe',
    'clearCacheOnLoad' => true,
    'version' => '6.0.1',
    'state' => 'stable',
    'author' => 'Gernot Leitgab',
    'author_company' => 'Webentwickler.at',
    'constraints' => [
        'depends' => [
<<<<<<< HEAD
            'typo3' => '10.4.0-12.4.99',
=======
            'typo3' => '11.5.0-11.5.99',
>>>>>>> 8796f68 ([BUGFIX] version information)
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
