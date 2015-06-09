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
 * FzKategorieController
 */
class FzKategorieController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * fzKategorieRepository
	 *
	 * @var \Y7group\Y7Fahrzeugdatenbank\Domain\Repository\FzKategorieRepository
	 * @inject
	 */
	protected $fzKategorieRepository = NULL;
	
	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$fzKategories = $this->fzKategorieRepository->findAll();
		debug($fzKategories, '('.__CLASS__.'::'.__FUNCTION__.')', __LINE__, __FILE__, 3); // TODO DELETE
		$this->view->assign('fzKategories', $fzKategories);
	}

	/**
	 * action show
	 *
	 * @param \Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzKategorie $fzKategorie
	 * @return void
	 */
	public function showAction(\Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzKategorie $fzKategorie) {
		$this->view->assign('fzKategorie', $fzKategorie);
	}

	/**
	 * action listByCategory
	 *
	 * @return void
	 */
	public function listByCategoryAction(\Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzKategorie $fzKategorie) {
		$fzKategories = $this->fzKategorieRepository->findByCategory($fzKategorie);
		debug($fzKategories, '('.__CLASS__.'::'.__FUNCTION__.')', __LINE__, __FILE__, 3); // TODO DELETE
		$this->view->assign('fzKategories', $fzKategories);
	}

}