<?php
namespace MLA\Mlascoreclashnewtest\Controller;

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
 * PointController
 */
class PointController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * pointRepository
     *
     * @var \MLA\Mlascoreclashnewtest\Domain\Repository\PointRepository
     * @inject
     */
    protected $pointRepository = NULL;
     
     /**
     * clashRepository
     *
     * @var \MLA\Mlascoreclashnewtest\Domain\Repository\ClashRepository
     * @inject
     */
    protected $clashRepository = NULL;
    
    	/**
	 * @var Tx_Extbase_Object_ObjectManagerInterface
	 */
	protected $objectManager;
	
	
    /**
     * action list
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Point
     * @return void
     */
    public function listAction()
    {
        $points = $this->pointRepository->findAll();
        $this->view->assign('points', $points);
    }
    
    /**
     * action show
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Point
     * @return void
     */
    public function showAction(\MLA\Mlascoreclashnewtest\Domain\Model\Point $point)
    {
        $this->view->assign('point', $point);
    }
    
    /**
     * action new
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Point
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Point
     * @return void
     */
    public function createAction(\MLA\Mlascoreclashnewtest\Domain\Model\Point $newPoint)
    {
     $this->addFlashMessage('The point was recorded. Wait until your opponent approves the point.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
     
        $this->pointRepository->add($newPoint);
        $arguments = $this->request->getArguments();
        $clashId = $arguments["clash"];
        
        $clash = $this->clashRepository->findByUid($clashId);
       
        $persistenceManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance("TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager");
        $persistenceManager->persistAll();
        
   	$clash->addPoint($newPoint);
   	$this->clashRepository->update($clash);
   	
   	$arguments = array(
   		'clash' => $clashId
   	);
   	
        $this->redirect('show','Clash',NULL, $arguments);
    }
    
    /**
     * action approve
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Point
     * @return void
     */
    public function approveAction(\MLA\Mlascoreclashnewtest\Domain\Model\Point $point)
    {        
    	$arguments = $this->request->getArguments();
        $clashId = $arguments["clash"];

    	 $point->setApproved(1);
    	 $this->pointRepository->update($point);
    	 
        $this->redirect('show','Clash',NULL, $arguments);
    }
    
    
    /**
     * action edit
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Point
     * @ignorevalidation $point
     * @return void
     */
    public function editAction(\MLA\Mlascoreclashnewtest\Domain\Model\Point $point)
    {
        $this->view->assign('point', $point);
    }
    
    /**
     * action update
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Point
     * @return void
     */
    public function updateAction(\MLA\Mlascoreclashnewtest\Domain\Model\Point $point)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->pointRepository->update($point);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Point
     * @return void
     */
    public function deleteAction(\MLA\Mlascoreclashnewtest\Domain\Model\Point $point)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->pointRepository->remove($point);
        $this->redirect('list');
    }

}