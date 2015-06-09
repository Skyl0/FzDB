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

		//DEBUG
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = 1; //TODO DELETE
		
		$res1 = $GLOBALS["TYPO3_DB"]->exec_SELECTgetSingleRow(
			'participating_vehicles', // SELECT
			'tt_news', // FROM
			'uid = ' . $row['uid'], //WHERE
			'', //GROUPBY
			'', //ORDERBY
			'', //LIMIT
			'' //uidIndexField
		);
		
		// SQL Abfrage
		$res2 = $GLOBALS["TYPO3_DB"]->exec_SELECTgetRows(
			'uid, name, beschreibung', // SELECT
			'tx_y7fahrzeugdatenbank_domain_model_fahrzeug', // FROM
			'uid IN (' . $res1['participating_vehicles'] . ')', //WHERE
			'', //GROUPBY
			'', //ORDERBY
			'', //LIMIT
			'' //uidIndexField
		);
		// debug($GLOBALS['TYPO3_DB']->debug_lastBuiltQuery, '('.__CLASS__.'::'.__FUNCTION__.')', __LINE__, __FILE__, 3);
		if ($res2) {
			$editObj = & $markerArray['###FAHRZEUGE###']; // Zeiger auf Array (kuerzerer Code)				
			$editObj = '<div class="y7fahrzeuge"><h2>Beteiligte Fahrzeuge';//für ' . $row['title'];
			$editObj .= '</h2>'."\n".'<ul>';
			
			// debug($res2, '('.__CLASS__.'::'.__FUNCTION__.')', __LINE__, __FILE__, 3); // TODO DELETE		

			$counter  = 0;
			
			foreach ($res2 as $obj) {			
					$counter++;
					$editObj .= '<li class="y7_fz_' . $counter . '"><a href="';
					$editObj .= 'index.php?id=fahrzeuge&tx_y7fahrzeugdatenbank_y7fahrzeugefrontend[fahrzeug]=' . $obj['uid'];
					$editObj .= '&tx_y7fahrzeugdatenbank_y7fahrzeugefrontend[action]=show&tx_y7fahrzeugdatenbank_y7fahrzeugefrontend[controller]=Fahrzeug';
					$editObj .= '">' . $obj['name'] . '</a></li>'."\n";						
			}
			$editObj .= '</ul></div>';
		}
	
		
		return $markerArray;
		
	}
}
?>