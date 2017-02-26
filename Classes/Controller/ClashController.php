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
 * ClashController
 */
class ClashController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * clashRepository
     *
     * @var \MLA\Mlascoreclashnewtest\Domain\Repository\ClashRepository
     * @inject
     */
    protected $clashRepository = NULL;
    
  
    /**
     * User Repository
     *
     * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository
     * @inject
     */
    protected $userRepository;
    
    /**
     * activityRepository
     * @var \MLA\Mlascoreclashnewtest\Domain\Repository\ActivityRepository
     * @inject
     */
    protected $activityRepository = NULL;
    
    /**
     * pointRepository
     * @var \MLA\Mlascoreclashnewtest\Domain\Repository\PointRepository
     * @inject
     */
    protected $pointRepository = NULL;
    
    
    /**
     * action list
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Clash
     * @return void
     */
    public function listAction()
    {
        $loggedInUser = $GLOBALS['TSFE']->fe_user->user;
        $loggedInUserUid = $GLOBALS['TSFE']->fe_user->user['uid'];
        
    	$clashes = $this->clashRepository->findAllClashesFromUser($GLOBALS['TSFE']->fe_user->user['uid']);
    	
        $this->view->assign('loggedInUser', $loggedInUser);
        $this->view->assign('clashes', $clashes);
    }
    
    /**
     * action show
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Clash
     * @return void
     */
    public function showAction(\MLA\Mlascoreclashnewtest\Domain\Model\Clash $clash)
    {
        $loggedInUser = $GLOBALS['TSFE']->fe_user->user;
        $loggedInUserUid = $GLOBALS['TSFE']->fe_user->user['uid'];
        $opponentUser;
        
        /*define opponent*/
        if($clash->getFirstuser()->getUid() == $loggedInUserUid){
        	$opponentUser = $clash->getSeconduser();
        	$loggedInUser = $clash->getFirstuser();
        }elseif($clash->getSeconduser()->getUid() == $loggedInUserUid) {
                $opponentUser = $clash->getFirstuser();
        	$loggedInUser = $clash->getSeconduser();
        }
    	
    	
    	/*
    	* get Points and Put them into Array per User and draws
    	*
    	*/
    	$unapprovedPointsFromLoggedInUser = new  \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    	$loggedInUserPoints = 0;
    	$opponentUserPoints = 0;
    	$draws = 0;
    	
    	foreach($clash->getPoints() as $point){
    		if($point->getApproved() == 1){
	    		 if(empty($point->getUser())){
	    		    $draws++;
	    		} elseif($point->getUser()->getUsername() == $loggedInUser->getUsername()){
	    		    $loggedInUserPoints++;
	    		    
	    		} elseif($point->getUser()->getUsername() == $opponentUser->getUsername()){
	    		    $opponentUserPoints++;
	    		}
    		} else {
	    		 if($point->getCreator()->getUsername() != $loggedInUser->getUsername()) {
	    		 	$unapprovedPointsFromLoggedInUser->attach($point);
	    		 }
    		}
    	}
    	
    	
        $this->view->assign('loggedInUser', $loggedInUser);
        $this->view->assign('opponentUser', $opponentUser);
        
        $this->view->assign('draws', $draws);
        $this->view->assign('loggedInUserPoints', $loggedInUserPoints);
        $this->view->assign('opponentUserPoints', $opponentUserPoints);
        $this->view->assign('clash', $clash);
        $this->view->assign('unapprovedPointsFromLoggedInUser', $unapprovedPointsFromLoggedInUser);
    }
    
    /**
     * action new
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Clash
     * @return void
     */
    public function newAction()
    {
     	$loggedInUserUid = $GLOBALS['TSFE']->fe_user->user['uid'];
        
     	$activities = $this->activityRepository->findAll();
    	$users = $this->userRepository->findAll();
  
        $this->view->assign('loggedInUserUid', $loggedInUserUid);
        $this->view->assign('activities', $activities);
        $this->view->assign('users', $users);
    }
    
    /**
     * action create
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Clash
     * @return void
     */
    public function createAction(\MLA\Mlascoreclashnewtest\Domain\Model\Clash $newClash)
    {
        $this->clashRepository->add($newClash);
        
        $persistenceManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance("TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager");
        $persistenceManager->persistAll();
        
	$this->redirect('show', NULL, NULL, array('clash' => $newClash->getUid()));
    }
    
    /**
     * action Create Point
     *
     * @return void
     */
    public function createPoint()
    {var_dump('blabla');
        //$this->pointRepository->add($newPoint);
        //$this->redirect('list');
        
		//$this->redirect('show', NULL, NULL, array('clash' => $newClash));
    }
    
    
    /**
     * action edit
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Clash
     * @ignorevalidation $clash
     * @return void
     */
    public function editAction(\MLA\Mlascoreclashnewtest\Domain\Model\Clash $clash)
    {
        $this->view->assign('clash', $clash);
    }
    
    /**
     * action update
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Clash
     * @return void
     */
    public function updateAction(\MLA\Mlascoreclashnewtest\Domain\Model\Clash $clash)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->clashRepository->update($clash);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Clash
     * @return void
     */
    public function deleteAction(\MLA\Mlascoreclashnewtest\Domain\Model\Clash $clash)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->clashRepository->remove($clash);
        $this->redirect('list');
    }

}