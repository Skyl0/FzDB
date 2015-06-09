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
 * Test case for class \Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzNewsRel.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Marc Ernst <ernst.marc@gmail.com>
 */
class FzNewsRelTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzNewsRel
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzNewsRel();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNewsUidReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getNewsUid()
		);
	}

	/**
	 * @test
	 */
	public function setNewsUidForIntegerSetsNewsUid() {
		$this->subject->setNewsUid(12);

		$this->assertAttributeEquals(
			12,
			'newsUid',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFahrzeugUidReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getFahrzeugUid()
		);
	}

	/**
	 * @test
	 */
	public function setFahrzeugUidForIntegerSetsFahrzeugUid() {
		$this->subject->setFahrzeugUid(12);

		$this->assertAttributeEquals(
			12,
			'fahrzeugUid',
			$this->subject
		);
	}
}
