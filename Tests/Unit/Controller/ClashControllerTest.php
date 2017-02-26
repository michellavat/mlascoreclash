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
 * Test case for class MLA\Mlascoreclashnewtest\Controller\ClashController.
 *
 * @author Michel Lavat <michellavat@gmail.com>
 */
class ClashControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \MLA\Mlascoreclashnewtest\Controller\ClashController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('MLA\\Mlascoreclashnewtest\\Controller\\ClashController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllClashesFromRepositoryAndAssignsThemToView()
	{

		$allClashes = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$clashRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\ClashRepository', array('findAll'), array(), '', FALSE);
		$clashRepository->expects($this->once())->method('findAll')->will($this->returnValue($allClashes));
		$this->inject($this->subject, 'clashRepository', $clashRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('clashes', $allClashes);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenClashToView()
	{
		$clash = new \MLA\Mlascoreclashnewtest\Domain\Model\Clash();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('clash', $clash);

		$this->subject->showAction($clash);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenClashToClashRepository()
	{
		$clash = new \MLA\Mlascoreclashnewtest\Domain\Model\Clash();

		$clashRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\ClashRepository', array('add'), array(), '', FALSE);
		$clashRepository->expects($this->once())->method('add')->with($clash);
		$this->inject($this->subject, 'clashRepository', $clashRepository);

		$this->subject->createAction($clash);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenClashToView()
	{
		$clash = new \MLA\Mlascoreclashnewtest\Domain\Model\Clash();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('clash', $clash);

		$this->subject->editAction($clash);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenClashInClashRepository()
	{
		$clash = new \MLA\Mlascoreclashnewtest\Domain\Model\Clash();

		$clashRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\ClashRepository', array('update'), array(), '', FALSE);
		$clashRepository->expects($this->once())->method('update')->with($clash);
		$this->inject($this->subject, 'clashRepository', $clashRepository);

		$this->subject->updateAction($clash);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenClashFromClashRepository()
	{
		$clash = new \MLA\Mlascoreclashnewtest\Domain\Model\Clash();

		$clashRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\ClashRepository', array('remove'), array(), '', FALSE);
		$clashRepository->expects($this->once())->method('remove')->with($clash);
		$this->inject($this->subject, 'clashRepository', $clashRepository);

		$this->subject->deleteAction($clash);
	}
}
