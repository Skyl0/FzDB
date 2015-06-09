<?php
namespace Y7group\Y7Fahrzeugdatenbank\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Marc Ernst <ernst.marc@gmail.com>, Y7 group
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * FahrzeugController
 */
class FahrzeugController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * fahrzeugRepository
	 *
	 * @var \Y7group\Y7Fahrzeugdatenbank\Domain\Repository\FahrzeugRepository
	 * @inject
	 */
	protected $fahrzeugRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$fahrzeugs = $this->fahrzeugRepository->findAll();
		$this->view->assign('fahrzeugs', $fahrzeugs);
	}

	/**
	 * action show
	 *
	 * @param \Y7group\Y7Fahrzeugdatenbank\Domain\Model\Fahrzeug $fahrzeug
	 * @return void
	 */
	public function showAction(\Y7group\Y7Fahrzeugdatenbank\Domain\Model\Fahrzeug $fahrzeug) {
		$this->view->assign('fahrzeug', $fahrzeug);
	}

	/**
	 * action listByCategory
	 * @param \Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzKategorie $cat
	 * @return void
	 */
	public function listByCategoryAction(){//(\Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzKategorie $cat) {
		$vehicles = $this->fahrzeugRepository->findAll();
		// \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings);
		$category = $this->settings["p".$GLOBALS['TSFE']->id];
		// \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($vehicles);
		
		$this->view->assign('category', $category);
		$this->view->assign('vehicles', $vehicles);
	}

}