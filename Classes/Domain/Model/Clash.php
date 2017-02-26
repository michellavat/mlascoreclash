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
 * Clash
 */
class Clash extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $image = null;
    
    /**
     * activity
     *
     * @var \MLA\Mlascoreclashnewtest\Domain\Model\Activity
     * @lazy
     */
    protected $activity = null;
    
    /**
     * points
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MLA\Mlascoreclashnewtest\Domain\Model\Point>
     * @cascade remove
     * @lazy
     */
    protected $points = null;
    
    /**
     * firstuser
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
     * @lazy
     */
    protected $firstuser = null;
    
    /**
     * seconduser
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
     * @lazy
     */
    protected $seconduser = null;
    
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
        $this->points = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the activity
     *
     * @return \MLA\Mlascoreclashnewtest\Domain\Model\Activity activity
     */
    public function getActivity()
    {
        return $this->activity;
    }
    
    /**
     * Sets the activity
     *
     * @param \MLA\Mlascoreclashnewtest\Domain\Model\Activity $activity
     * @return void
     */
    public function setActivity(\MLA\Mlascoreclashnewtest\Domain\Model\Activity $activity)
    {
        $this->activity = $activity;
    }
    
    /**
     * Adds a Point
     *
     * @param \MLA\Mlascoreclashnewtest\Domain\Model\Point $point
     * @return void
     */
    public function addPoint(\MLA\Mlascoreclashnewtest\Domain\Model\Point $point)
    {
        $this->points->attach($point);
    }
    
    /**
     * Removes a Point
     *
     * @param \MLA\Mlascoreclashnewtest\Domain\Model\Point $pointToRemove The Point to be removed
     * @return void
     */
    public function removePoint(\MLA\Mlascoreclashnewtest\Domain\Model\Point $pointToRemove)
    {
        $this->points->detach($pointToRemove);
    }
    
    /**
     * Returns the points
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MLA\Mlascoreclashnewtest\Domain\Model\Point> points
     */
    public function getPoints()
    {
        return $this->points;
    }
    
    /**
     * Sets the points
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MLA\Mlascoreclashnewtest\Domain\Model\Point> $points
     * @return void
     */
    public function setPoints(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $points)
    {
        $this->points = $points;
    }
    
    /**
     * Returns the firstuser
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $firstuser
     */
    public function getFirstuser()
    {
        return $this->firstuser;
    }
    
    /**
     * Sets the firstuser
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $firstuser
     * @return void
     */
    public function setFirstuser(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $firstuser)
    {
        $this->firstuser = $firstuser;
    }
    
    /**
     * Returns the seconduser
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $seconduser
     */
    public function getSeconduser()
    {
        return $this->seconduser;
    }
    
    /**
     * Sets the seconduser
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $seconduser
     * @return void
     */
    public function setSeconduser(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $seconduser)
    {
        $this->seconduser = $seconduser;
    }

}