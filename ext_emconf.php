<?php
$EM_CONF[$_EXTKEY] = array(
	'title' => 'Emogrifier',
	'description' => 'Converts CSS styles into inline HTML styles.',
	'category' => 'fe',
	'version' => '1.1.0',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'author' => 'Gernot Leitgab',
	'author_company' => 'Webentwickler.at',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2.0-8.7.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'autoload' => array(
		'psr-4' => array(
			'WebentwicklerAt\\Emogrifier\\' => 'Classes/',
			'Pelago\\' => 'Resources/Private/PHP/emogrifier/Classes/',
		),
	),
);
