<?php
namespace Y7group\Y7Fahrzeugdatenbank\Domain\Model;


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
 * Fahrzeug
 */
class Fahrzeug extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name = '';

	/**
	 * beschreibung
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $beschreibung = '';

	/**
	 * bild
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 * @cascade remove
	 */
	protected $bild = NULL;

	/**
	 * datenblatt
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $datenblatt = NULL;

	/**
	 * n Fahrzeuge haben 1 Kategorie
	 *
	 * @var \Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzKategorie
	 */
	protected $kategorie = NULL;

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the beschreibung
	 *
	 * @return string $beschreibung
	 */
	public function getBeschreibung() {
		return $this->beschreibung;
	}

	/**
	 * Sets the beschreibung
	 *
	 * @param string $beschreibung
	 * @return void
	 */
	public function setBeschreibung($beschreibung) {
		$this->beschreibung = $beschreibung;
	}

		 /**
         * Constructor
         *
         * @return AbstractObject
         */
        public function __construct() {
                // ObjectStorage is needed to reference multiple files to one field
                // see also @var before variable and @return before the respective get() method
                $this->bild = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        }

	

	/**
	 * Returns the bild
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $bild
	 
	public function getBild() {
		return $this->bild;
	}

	/**
	 * Sets the bild
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $bild
	 * @return void
	
	public function addBild (\TYPO3\Extbase\Domain\Model\FileReference $bild) {
		//$this->bild = $bild;
		$this->bild->attach($bild);
	}
*/
		/**
	 * Adds a FileReference
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 * @return void
	 */
	public function addImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $bildToAdd) {
		$this->bild->attach($bildToAdd);
	}

	/**
	 * Removes a FileReference
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove The FileReference to be removed
	 * @return void
	 */
	public function removeImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $bildToRemove) {
		$this->bild->detach($bildToRemove);
	}
		/**
	 * Returns the images
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
	 */
	public function getBild() {
		return $this->bild;
	}

	/**
	 * Sets the images
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
	 * @return void
	 */
	public function setBild(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $bild) {
		$this->bild = $bild;
	}


/**
 *
 * Datenblatt
 * 
 */
	
	/**
	 * Returns the datenblatt
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $datenblatt
	 */
	public function getDatenblatt() {
		return $this->datenblatt;
	}

	/**
	 * Sets the datenblatt
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $datenblatt
	 * @return void
	 */
	public function setDatenblatt(\TYPO3\CMS\Extbase\Domain\Model\FileReference $datenblatt) {
		$this->datenblatt = $datenblatt;
	}

	/**
	 * Returns the kategorie
	 *
	 * @return \Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzKategorie $kategorie
	 */
	public function getKategorie() {
		return $this->kategorie;
	}

	/**
	 * Sets the kategorie
	 *
	 * @param \Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzKategorie $kategorie
	 * @return void
	 */
	public function setKategorie(\Y7group\Y7Fahrzeugdatenbank\Domain\Model\FzKategorie $kategorie) {
		$this->kategorie = $kategorie;
	}

}