<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Y7group.' . $_EXTKEY,
	'Y7fahrzeugefrontend',
	array(
		'Fahrzeug' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Fahrzeug' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Y7group.' . $_EXTKEY,
	'Y7fahrzeugefrontendkat',
	array(
		'Fahrzeug' => 'listByCategory, show',
		
	),
	// non-cacheable actions
	array(
		'Fahrzeug' => '',
		
	)
);
$TYPO3_CONF_VARS['EXTCONF']['tt_news']['extraItemMarkerHook'][] = 'EXT:y7_fahrzeugdatenbank/NewsHook.php:&NewsHook';