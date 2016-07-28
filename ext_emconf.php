<?php
$EM_CONF[$_EXTKEY] = array(
	'title' => 'Emogrifier',
	'description' => 'Converts CSS styles into inline HTML styles.',
	'category' => 'fe',
	'version' => '1.0.0',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'author' => 'Gernot Leitgab',
	'author_email' => 'typo3@webentwickler.at',
	'author_company' => 'Webentwickler.at',
	'constraints' => array(
		'depends' => array(
			'typo3' => '7.6.0-7.6.99',
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
