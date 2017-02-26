<?php
namespace MLA\Mlascoreclashnewtest\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Michel Lavat <michellavat@gmail.com>
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
 * Tournament
 */
class Tournament extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     */
    protected $name = '';
    
    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $image = null;
    
    /**
     * clash
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MLA\Mlascoreclashnewtest\Domain\Model\Clash>
     */
    protected $clash = null;
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->clash = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the name
     *
     * @return string name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference image
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }
    
    /**
     * Adds a Clash
     *
     * @param \MLA\Mlascoreclashnewtest\Domain\Model\Clash $clash
     * @return void
     */
    public function addClash(\MLA\Mlascoreclashnewtest\Domain\Model\Clash $clash)
    {
        $this->clash->attach($clash);
    }
    
    /**
     * Removes a Clash
     *
     * @param \MLA\Mlascoreclashnewtest\Domain\Model\Clash $clashToRemove The Clash to be removed
     * @return void
     */
    public function removeClash(\MLA\Mlascoreclashnewtest\Domain\Model\Clash $clashToRemove)
    {
        $this->clash->detach($clashToRemove);
    }
    
    /**
     * Returns the clash
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MLA\Mlascoreclashnewtest\Domain\Model\Clash> clash
     */
    public function getClash()
    {
        return $this->clash;
    }
    
    /**
     * Sets the clash
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MLA\Mlascoreclashnewtest\Domain\Model\Clash> $clash
     * @return void
     */
    public function setClash(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $clash)
    {
        $this->clash = $clash;
    }

}