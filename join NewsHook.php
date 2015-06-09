<?php
// $logger = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Core\Log\LogManager')->getLogger(__CLASS__);
class NewsHook {
	
	/**
	 * Extra Codes for tt_news
	 * @param array $parentMarkerArray
	 * @param array $row
	 * @param array $lConf
	 * @param tx_ttnews $tt_news
	 * @return array
	 */
	public function extraItemMarkerProcessor(array $markerArray, array $row, array $lConf, tx_ttnews $tt_news) {
		//debug($parentMarkerArray, '('.__CLASS__.'::'.__FUNCTION__.')', __LINE__, __FILE__, 3); // TODO DELETE
		// $myArray = array();
		
		//DEBUG
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1; //TODO DELETE
		
		$editObj = &$markerArray['###FAHRZEUGE###'];
		
		$editObj = '<h2>Beteiligte Fahrzeuge für ' . $row['title'];
		$editObj .= /*'  [tt_news.uid='.  $row['uid']  .']*/'</h2><table class="tx_y7fahrzeugdatenbank">';
		
		// Datenbank Abfrage
		// $res = $GLOBALS["TYPO3_DB"]->exec_SELECTgetRows('name, beschreibung', 'tx_y7fahrzeugdatenbank_domain_model_fahrzeug','','','','','');
		$query = $GLOBALS["TYPO3_DB"]->exec_SELECTquery(
			'name, beschreibung, news_uid, fahrzeug_uid', // SELECT
			'tx_y7fahrzeugdatenbank_domain_model_fznewsrel JOIN tx_y7fahrzeugdatenbank_domain_model_fahrzeug ON tx_y7fahrzeugdatenbank_domain_model_fznewsrel.fahrzeug_uid = tx_y7fahrzeugdatenbank_domain_model_fahrzeug.uid', // FROM
			'news_uid = 7' /*. $row['uid']*/, //WHERE
			'', //GROUPBY
			'', //ORDERBY
			'', //LIMIT
			'' //uidIndexField
		);
		$res = $GLOBALS['TYPO3_DB']->sql_fetch_assoc( $query );
		
		//debug
		debug($GLOBALS['TYPO3_DB']->debug_lastBuiltQuery, '('.__CLASS__.'::'.__FUNCTION__.')', __LINE__, __FILE__, 3);
		
		debug($res, '('.__CLASS__.'::'.__FUNCTION__.')', __LINE__, __FILE__, 3); // TODO DELETE
		// $this->cObj = $tt_news->local_cObj;		
		$editObj .= '<tr><th>Name</th><th>Beschreibung</th></tr>';
		$counter  = 0;
		
		foreach ($res as $obj => $value) {
				debug($obj, '('.__CLASS__.'::'.__FUNCTION__.')', __LINE__, __FILE__, 3); // TODO DELETE
				$counter++;
				$editObj .= '<tr><td class="tx_y7fz_td_' . $counter . '_1">' . $obj['name'] . '</td><td class="tx_y7fz_td_' . $counter . '_2">'  . $obj['beschreibung'] . '</td></tr>';		
		}
		$markerArray['###FAHRZEUGE###'] .= '</table>';
		
		// $parentMarkerArray = array_merge($parentMarkerArray,$myArray);
		
		return $markerArray;
		
	}
}
?>