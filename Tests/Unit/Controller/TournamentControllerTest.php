<?php
namespace MLA\Mlascoreclashnewtest\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Michel Lavat <michellavat@gmail.com>
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
 * Test case for class MLA\Mlascoreclashnewtest\Controller\TournamentController.
 *
 * @author Michel Lavat <michellavat@gmail.com>
 */
class TournamentControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \MLA\Mlascoreclashnewtest\Controller\TournamentController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('MLA\\Mlascoreclashnewtest\\Controller\\TournamentController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllTournamentsFromRepositoryAndAssignsThemToView()
	{

		$allTournaments = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$tournamentRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\TournamentRepository', array('findAll'), array(), '', FALSE);
		$tournamentRepository->expects($this->once())->method('findAll')->will($this->returnValue($allTournaments));
		$this->inject($this->subject, 'tournamentRepository', $tournamentRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('tournaments', $allTournaments);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenTournamentToView()
	{
		$tournament = new \MLA\Mlascoreclashnewtest\Domain\Model\Tournament();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('tournament', $tournament);

		$this->subject->showAction($tournament);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenTournamentToTournamentRepository()
	{
		$tournament = new \MLA\Mlascoreclashnewtest\Domain\Model\Tournament();

		$tournamentRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\TournamentRepository', array('add'), array(), '', FALSE);
		$tournamentRepository->expects($this->once())->method('add')->with($tournament);
		$this->inject($this->subject, 'tournamentRepository', $tournamentRepository);

		$this->subject->createAction($tournament);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenTournamentToView()
	{
		$tournament = new \MLA\Mlascoreclashnewtest\Domain\Model\Tournament();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('tournament', $tournament);

		$this->subject->editAction($tournament);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenTournamentInTournamentRepository()
	{
		$tournament = new \MLA\Mlascoreclashnewtest\Domain\Model\Tournament();

		$tournamentRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\TournamentRepository', array('update'), array(), '', FALSE);
		$tournamentRepository->expects($this->once())->method('update')->with($tournament);
		$this->inject($this->subject, 'tournamentRepository', $tournamentRepository);

		$this->subject->updateAction($tournament);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenTournamentFromTournamentRepository()
	{
		$tournament = new \MLA\Mlascoreclashnewtest\Domain\Model\Tournament();

		$tournamentRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\TournamentRepository', array('remove'), array(), '', FALSE);
		$tournamentRepository->expects($this->once())->method('remove')->with($tournament);
		$this->inject($this->subject, 'tournamentRepository', $tournamentRepository);

		$this->subject->deleteAction($tournament);
	}
}
