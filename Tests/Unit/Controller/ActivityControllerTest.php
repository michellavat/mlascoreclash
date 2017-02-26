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
 * Test case for class MLA\Mlascoreclashnewtest\Controller\ActivityController.
 *
 * @author Michel Lavat <michellavat@gmail.com>
 */
class ActivityControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \MLA\Mlascoreclashnewtest\Controller\ActivityController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('MLA\\Mlascoreclashnewtest\\Controller\\ActivityController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllActivitiesFromRepositoryAndAssignsThemToView()
	{

		$allActivities = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$activityRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\ActivityRepository', array('findAll'), array(), '', FALSE);
		$activityRepository->expects($this->once())->method('findAll')->will($this->returnValue($allActivities));
		$this->inject($this->subject, 'activityRepository', $activityRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('activities', $allActivities);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenActivityToView()
	{
		$activity = new \MLA\Mlascoreclashnewtest\Domain\Model\Activity();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('activity', $activity);

		$this->subject->showAction($activity);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenActivityToActivityRepository()
	{
		$activity = new \MLA\Mlascoreclashnewtest\Domain\Model\Activity();

		$activityRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\ActivityRepository', array('add'), array(), '', FALSE);
		$activityRepository->expects($this->once())->method('add')->with($activity);
		$this->inject($this->subject, 'activityRepository', $activityRepository);

		$this->subject->createAction($activity);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenActivityToView()
	{
		$activity = new \MLA\Mlascoreclashnewtest\Domain\Model\Activity();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('activity', $activity);

		$this->subject->editAction($activity);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenActivityInActivityRepository()
	{
		$activity = new \MLA\Mlascoreclashnewtest\Domain\Model\Activity();

		$activityRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\ActivityRepository', array('update'), array(), '', FALSE);
		$activityRepository->expects($this->once())->method('update')->with($activity);
		$this->inject($this->subject, 'activityRepository', $activityRepository);

		$this->subject->updateAction($activity);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenActivityFromActivityRepository()
	{
		$activity = new \MLA\Mlascoreclashnewtest\Domain\Model\Activity();

		$activityRepository = $this->getMock('MLA\\Mlascoreclashnewtest\\Domain\\Repository\\ActivityRepository', array('remove'), array(), '', FALSE);
		$activityRepository->expects($this->once())->method('remove')->with($activity);
		$this->inject($this->subject, 'activityRepository', $activityRepository);

		$this->subject->deleteAction($activity);
	}
}
