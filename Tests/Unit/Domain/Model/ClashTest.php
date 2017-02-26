<?php

namespace MLA\Mlascoreclashnewtest\Tests\Unit\Domain\Model;

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
 * Test case for class \MLA\Mlascoreclashnewtest\Domain\Model\Clash.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Michel Lavat <michellavat@gmail.com>
 */
class ClashTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \MLA\Mlascoreclashnewtest\Domain\Model\Clash
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \MLA\Mlascoreclashnewtest\Domain\Model\Clash();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForFileReferenceSetsImage()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setImage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'image',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getActivityReturnsInitialValueForActivity()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getActivity()
		);
	}

	/**
	 * @test
	 */
	public function setActivityForActivitySetsActivity()
	{
		$activityFixture = new \MLA\Mlascoreclashnewtest\Domain\Model\Activity();
		$this->subject->setActivity($activityFixture);

		$this->assertAttributeEquals(
			$activityFixture,
			'activity',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPointsReturnsInitialValueForPoint()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getPoints()
		);
	}

	/**
	 * @test
	 */
	public function setPointsForObjectStorageContainingPointSetsPoints()
	{
		$point = new \MLA\Mlascoreclashnewtest\Domain\Model\Point();
		$objectStorageHoldingExactlyOnePoints = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOnePoints->attach($point);
		$this->subject->setPoints($objectStorageHoldingExactlyOnePoints);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOnePoints,
			'points',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addPointToObjectStorageHoldingPoints()
	{
		$point = new \MLA\Mlascoreclashnewtest\Domain\Model\Point();
		$pointsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$pointsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($point));
		$this->inject($this->subject, 'points', $pointsObjectStorageMock);

		$this->subject->addPoint($point);
	}

	/**
	 * @test
	 */
	public function removePointFromObjectStorageHoldingPoints()
	{
		$point = new \MLA\Mlascoreclashnewtest\Domain\Model\Point();
		$pointsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$pointsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($point));
		$this->inject($this->subject, 'points', $pointsObjectStorageMock);

		$this->subject->removePoint($point);

	}

	/**
	 * @test
	 */
	public function getFirstuserReturnsInitialValueForFrontendUser()
	{	}

	/**
	 * @test
	 */
	public function setFirstuserForFrontendUserSetsFirstuser()
	{	}

	/**
	 * @test
	 */
	public function getSeconduserReturnsInitialValueForFrontendUser()
	{	}

	/**
	 * @test
	 */
	public function setSeconduserForFrontendUserSetsSeconduser()
	{	}
}
