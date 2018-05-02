<?php

namespace Tests\Unit;

use App\PracticeModel;
use Tests\helpers\ModelHelpers;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PracticeTest extends TestCase
{
	use ModelHelpers;

	public function testGetsReadableMetaData()
	{
		$article = new PracticeModel;
		$article->title = 'My First Article';
		$article->author = 'Perd Hapley';

		$this->assertEquals(
			'"My First Article" was written by Perd Hapley.',
			$article->meta()
		);
	}

	public function testIsInvalidWithoutTitle()
	{
		$article = new PracticeModel; 

		$this->assertFalse($article->validate(), 'Expected validation to fail');
	}

	public function testIsValidModel()
	{
		$article = new PracticeModel;
		$article->title = 'My First Article';
		$article->author = 'Perd Hapley';
 
		$this->assertValid($article);
	}
 
	// public function testHasManyUsers()
	// {
	// 	// shouldDefineRelationship
	// 	$this->assertHasMany('users','PracticeModel');
	// }

	// public function testNativeMocks()
	// {
	// 	$mock = $this->getMock('SomeClass');
	// 	$mock->expects($this->once())
	// 		->method('getName')
	// 		->will($this->returnValue('John Doe'));
	// }

	// public function testMockery()
	// {
	// 	$mock = \Mockery::mock('App\PracticeModel');
	// 	$mock->shouldReceive('getName')
	// 		->once()
	// 		->andReturn('John Doe');
	// }
	
	
}
