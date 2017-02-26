<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'MLA.' . $_EXTKEY,
	'Scoreclash',
	array(
		'Clash' => 'list, show, new, create, edit, update, delete',
		'Activity' => 'list, show, new, create, edit, update, delete',
		'Tournament' => 'list, show, new, create, edit, update, delete',
		'Point' => 'list, show, new, create, edit, update, delete, approve',
		
	),
	// non-cacheable actions
	array(
		'Clash' => 'create, update, delete',
		'Activity' => 'list,show,create, update, delete',
		'Tournament' => 'create, update, delete',
		'Point' => 'create, update, delete, approve',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'MLA.' . $_EXTKEY,
	'Scoreclash Stats',
	array(
		'Clash' => 'list, show, new, create, edit, update, delete',
		'Activity' => 'list, show, new, create, edit, update, delete',
		'Tournament' => 'list, show, new, create, edit, update, delete',
		'Point' => 'list, show, new, create, edit, update, delete, approve',
		
	),
	// non-cacheable actions
	array(
		'Clash' => 'create, update, delete',
		'Activity' => 'create, update, delete',
		'Tournament' => 'create, update, delete',
		'Point' => 'create, update, delete, approve',
		
	)
);