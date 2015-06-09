<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Y7fahrzeugefrontend',
	'Y7 Fahrzeuganzeige'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Y7fahrzeugefrontendkat',
	'Y7 Fahrzeugkategorie'
);


$tempColumns = array (
	"is_operation" => array (		
		"exclude" => 1,		
		"label" => "Ist Einsatz?",		
		"config" => Array (
			"type" => "check",
		)
	),
	"participating_vehicles" => array (		
		"exclude" => 0,		
		"label" => "Beteiligte Fahrzeuge",		
		"config" => Array (
			"type" => "select",	
			"internal_type" => "db",
			// "items" => array(
				// array("",0),
			// ),
			"foreign_table" => "tx_y7fahrzeugdatenbank_domain_model_fahrzeug",
			"foreign_table_where" => "ORDER BY tx_y7fahrzeugdatenbank_domain_model_fahrzeug.name",
			"allowed" => "tx_y7fahrzeugdatenbank_domain_model_fahrzeug",
			// "itemsProcFunc" => 'y7_fahrzeugdatenbank\\Classes\\Controller\\FahrzeugController->listAction',
			"size" => 15,	
			"minitems" => 0,
			"maxitems" => 9999,	
			// "MM" => "tx_y7fahrzeugdatenbank_domain_model_mm",
			// "MM_table_where" => "WHERE news_uid = ",
			// "MM_opposite_field" => "uid_foreign",
		)
	),
);
// debug($tempColumns);
// $logger->info("tempColumns: ",$tempColumns);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns("tt_news",$tempColumns,1);


// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes("tt_news",
	// "is_operation;;;;1-1-1",'','after:short'
// );
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes("tt_news",
	"participating_vehicles;;;;1-1-1",'','after:short'
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Y7 Fahrzeugdatenbank');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_y7fahrzeugdatenbank_domain_model_fahrzeug', 'EXT:y7_fahrzeugdatenbank/Resources/Private/Language/locallang_csh_tx_y7fahrzeugdatenbank_domain_model_fahrzeug.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_y7fahrzeugdatenbank_domain_model_fahrzeug');
$GLOBALS['TCA']['tx_y7fahrzeugdatenbank_domain_model_fahrzeug'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:y7_fahrzeugdatenbank/Resources/Private/Language/locallang_db.xlf:tx_y7fahrzeugdatenbank_domain_model_fahrzeug',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',

		),
		'searchFields' => 'name,beschreibung,bild,datenblatt,kategorie,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Fahrzeug.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_y7fahrzeugdatenbank_domain_model_fahrzeug.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_y7fahrzeugdatenbank_domain_model_fzkategorie', 'EXT:y7_fahrzeugdatenbank/Resources/Private/Language/locallang_csh_tx_y7fahrzeugdatenbank_domain_model_fzkategorie.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_y7fahrzeugdatenbank_domain_model_fzkategorie');
$GLOBALS['TCA']['tx_y7fahrzeugdatenbank_domain_model_fzkategorie'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:y7_fahrzeugdatenbank/Resources/Private/Language/locallang_db.xlf:tx_y7fahrzeugdatenbank_domain_model_fzkategorie',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',

		),
		'searchFields' => 'name,beschreibung,bild,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/FzKategorie.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_y7fahrzeugdatenbank_domain_model_fzkategorie.gif'
	),
);
