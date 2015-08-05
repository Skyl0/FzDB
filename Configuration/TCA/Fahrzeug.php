<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_y7fahrzeugdatenbank_domain_model_fahrzeug'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_y7fahrzeugdatenbank_domain_model_fahrzeug']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, beschreibung, bild, datenblatt, kategorie',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, beschreibung, bild, datenblatt, kategorie, '),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_y7fahrzeugdatenbank_domain_model_fahrzeug',
				'foreign_table_where' => 'AND tx_y7fahrzeugdatenbank_domain_model_fahrzeug.pid=###CURRENT_PID### AND tx_y7fahrzeugdatenbank_domain_model_fahrzeug.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),

		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:y7_fahrzeugdatenbank/Resources/Private/Language/locallang_db.xlf:tx_y7fahrzeugdatenbank_domain_model_fahrzeug.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'beschreibung' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:y7_fahrzeugdatenbank/Resources/Private/Language/locallang_db.xlf:tx_y7fahrzeugdatenbank_domain_model_fahrzeug.beschreibung',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'bild' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:y7_fahrzeugdatenbank/Resources/Private/Language/locallang_db.xlf:tx_y7fahrzeugdatenbank_domain_model_fahrzeug.bild',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'bild',
				array('maxitems' => 99),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'datenblatt' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:y7_fahrzeugdatenbank/Resources/Private/Language/locallang_db.xlf:tx_y7fahrzeugdatenbank_domain_model_fahrzeug.datenblatt',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'datenblatt',
				array('maxitems' => 1),
				'pdf'
			),
		),
		'kategorie' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:y7_fahrzeugdatenbank/Resources/Private/Language/locallang_db.xlf:tx_y7fahrzeugdatenbank_domain_model_fahrzeug.kategorie',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_y7fahrzeugdatenbank_domain_model_fzkategorie',
				'minitems' => 1,
				'maxitems' => 1,
			),
		),
		
		'feuerwehr' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fztest/Resources/Private/Language/locallang_db.xlf:tx_fztest_domain_model_fahrzeug.feuerwehr',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('Berufsfeuerwehr', 0),
					array('FF Darmstadt-Arheilgen', 1),
					array('FF Darmstadt-Eberstadt', 2),
					array('FF Darmstadt-Innenstadt', 3),
					array('FF Darmstadt-Wixhausen', 4),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		
	),
);
