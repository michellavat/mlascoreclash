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
 * Test case for class MLA\Mlascoreclashnewtest\Controller\PointController.
 *
 * @author Michel Lavat <michellavat@gmail.com>
 */
class PointControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \MLA\Mlascoreclashnewtest\Controller\PointController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('MLA\\Mlascoreclashnewtest\\Controller\\PointController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllPointsFromRepositoryAndAssignsThemToView()
	{

		$allPoints = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$pointRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\PointRepository', array('findAll'), array(), '', FALSE);
		$pointRepository->expects($this->once())->method('findAll')->will($this->returnValue($allPoints));
		$this->inject($this->subject, 'pointRepository', $pointRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('points', $allPoints);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenPointToView()
	{
		$point = new \MLA\Mlascoreclashnewtest\Domain\Model\Point();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('point', $point);

		$this->subject->showAction($point);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenPointToPointRepository()
	{
		$point = new \MLA\Mlascoreclashnewtest\Domain\Model\Point();

		$pointRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\PointRepository', array('add'), array(), '', FALSE);
		$pointRepository->expects($this->once())->method('add')->with($point);
		$this->inject($this->subject, 'pointRepository', $pointRepository);

		$this->subject->createAction($point);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenPointToView()
	{
		$point = new \MLA\Mlascoreclashnewtest\Domain\Model\Point();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('point', $point);

		$this->subject->editAction($point);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenPointInPointRepository()
	{
		$point = new \MLA\Mlascoreclashnewtest\Domain\Model\Point();

		$pointRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\PointRepository', array('update'), array(), '', FALSE);
		$pointRepository->expects($this->once())->method('update')->with($point);
		$this->inject($this->subject, 'pointRepository', $pointRepository);

		$this->subject->updateAction($point);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenPointFromPointRepository()
	{
		$point = new \MLA\Mlascoreclashnewtest\Domain\Model\Point();

		$pointRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\PointRepository', array('remove'), array(), '', FALSE);
		$pointRepository->expects($this->once())->method('remove')->with($point);
		$this->inject($this->subject, 'pointRepository', $pointRepository);

		$this->subject->deleteAction($point);
	}
}
