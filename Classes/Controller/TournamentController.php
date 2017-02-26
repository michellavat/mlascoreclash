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
 * TournamentController
 */
class TournamentController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * tournamentRepository
     *
     * @var \MLA\Mlascoreclashnewtest\Domain\Repository\TournamentRepository
     * @inject
     */
    protected $tournamentRepository = NULL;
    
    /**
     * action list
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Tournament
     * @return void
     */
    public function listAction()
    {
        $tournaments = $this->tournamentRepository->findAll();
        $this->view->assign('tournaments', $tournaments);
    }
    
    /**
     * action show
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Tournament
     * @return void
     */
    public function showAction(\MLA\Mlascoreclashnewtest\Domain\Model\Tournament $tournament)
    {
        $this->view->assign('tournament', $tournament);
    }
    
    /**
     * action new
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Tournament
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Tournament
     * @return void
     */
    public function createAction(\MLA\Mlascoreclashnewtest\Domain\Model\Tournament $newTournament)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->tournamentRepository->add($newTournament);
        $this->redirect('list');
    }
    
    /**
     * action edit
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Tournament
     * @ignorevalidation $tournament
     * @return void
     */
    public function editAction(\MLA\Mlascoreclashnewtest\Domain\Model\Tournament $tournament)
    {
        $this->view->assign('tournament', $tournament);
    }
    
    /**
     * action update
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Tournament
     * @return void
     */
    public function updateAction(\MLA\Mlascoreclashnewtest\Domain\Model\Tournament $tournament)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->tournamentRepository->update($tournament);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param MLA\Mlascoreclashnewtest\Domain\Model\Tournament
     * @return void
     */
    public function deleteAction(\MLA\Mlascoreclashnewtest\Domain\Model\Tournament $tournament)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->tournamentRepository->remove($tournament);
        $this->redirect('list');
    }

}