<?php

namespace Y7group\Y7Fahrzeugdatenbank\Tests\Unit\Domain\Model;

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
 * Test case for class \Y7group\Y7Fahrzeugdatenbank\Domain\Model\TTnewsObj.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Marc Ernst <ernst.marc@gmail.com>
 */
class TTnewsObjTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Y7group\Y7Fahrzeugdatenbank\Domain\Model\TTnewsObj
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Y7group\Y7Fahrzeugdatenbank\Domain\Model\TTnewsObj();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getIsOperationReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getIsOperation()
		);
	}

	/**
	 * @test
	 */
	public function setIsOperationForBooleanSetsIsOperation() {
		$this->subject->setIsOperation(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'isOperation',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getParticipateReturnsInitialValueForFahrzeug() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getParticipate()
		);
	}

	/**
	 * @test
	 */
	public function setParticipateForObjectStorageContainingFahrzeugSetsParticipate() {
		$participate = new \Y7group\Y7Fahrzeugdatenbank\Domain\Model\Fahrzeug();
		$objectStorageHoldingExactlyOneParticipate = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneParticipate->attach($participate);
		$this->subject->setParticipate($objectStorageHoldingExactlyOneParticipate);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneParticipate,
			'participate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addParticipateToObjectStorageHoldingParticipate() {
		$participate = new \Y7group\Y7Fahrzeugdatenbank\Domain\Model\Fahrzeug();
		$participateObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$participateObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($participate));
		$this->inject($this->subject, 'participate', $participateObjectStorageMock);

		$this->subject->addParticipate($participate);
	}

	/**
	 * @test
	 */
	public function removeParticipateFromObjectStorageHoldingParticipate() {
		$participate = new \Y7group\Y7Fahrzeugdatenbank\Domain\Model\Fahrzeug();
		$participateObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$participateObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($participate));
		$this->inject($this->subject, 'participate', $participateObjectStorageMock);

		$this->subject->removeParticipate($participate);

	}
}
