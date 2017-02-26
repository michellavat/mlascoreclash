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
 * Point
 */
class Point extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{


    /**
     * value
     *
     * @var int
     * @validate NotEmpty
     */
    protected $value = 0;
    
    /**
     * user
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
     * @lazy
     */
    protected $user = null;
    
    /**
     * creator
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
     * @lazy
     */
    protected $creator = null;
    
    /**
     * approved
     *
     * @var boolean
     */
    protected $approved = null;
    
    
    
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
        
    }
    
    /**
     * Returns the value
     *
     * @return int value
     */
    public function getValue()
    {
        return $this->value;
    }
    
    /**
     * Sets the value
     *
     * @param int $value
     * @return void
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
    
    /**
     * Returns the user
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUser user
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Sets the user
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $user
     * @return void
     */
    public function setUser(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $user)
    {
        $this->user = $user;
    }
    
    
    /**
     * Returns the creator
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUser creator
     */
    public function getCreator()
    {
        return $this->creator;
    }
    
    /**
     * Sets the creator
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $creator
     * @return void
     */
    public function setCreator(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $creator)
    {
        $this->creator = $creator;
    }
    
    
    /**
     * Returns approved
     *
     * @return int approved
     */
    public function getApproved()
    {
        return $this->approved;
    }
    
    /**
     * Sets the approved
     *
     * @param int $approved
     * @return void
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
    }
    
    

}