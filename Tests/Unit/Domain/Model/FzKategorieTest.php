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
 * Test case for class \Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzKategorie.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Marc Ernst <ernst.marc@gmail.com>
 */
class FzKategorieTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzKategorie
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzKategorie();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName() {
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBeschreibungReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getBeschreibung()
		);
	}

	/**
	 * @test
	 */
	public function setBeschreibungForStringSetsBeschreibung() {
		$this->subject->setBeschreibung('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'beschreibung',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBildReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getBild()
		);
	}

	/**
	 * @test
	 */
	public function setBildForFileReferenceSetsBild() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setBild($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'bild',
			$this->subject
		);
	}
}
