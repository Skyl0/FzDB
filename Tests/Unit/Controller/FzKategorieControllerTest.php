<?php
namespace Y7group\Y7Fahrzeugdatenbank\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Marc Ernst <ernst.marc@gmail.com>, Y7 group
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Y7group\Y7Fahrzeugdatenbank\Controller\FzKategorieController.
 *
 * @author Marc Ernst <ernst.marc@gmail.com>
 */
class FzKategorieControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Y7group\Y7Fahrzeugdatenbank\Controller\FzKategorieController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Y7group\\Y7Fahrzeugdatenbank\\Controller\\FzKategorieController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllFzKategoriesFromRepositoryAndAssignsThemToView() {

		$allFzKategories = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$fzKategorieRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$fzKategorieRepository->expects($this->once())->method('findAll')->will($this->returnValue($allFzKategories));
		$this->inject($this->subject, 'fzKategorieRepository', $fzKategorieRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('fzKategories', $allFzKategories);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenFzKategorieToView() {
		$fzKategorie = new \Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzKategorie();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('fzKategorie', $fzKategorie);

		$this->subject->showAction($fzKategorie);
	}
}
