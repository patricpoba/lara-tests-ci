<?php

namespace Tests\Unit;

use App\File;
use App\Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GeneratorTest extends TestCase
{
 
	public function testItWorksWithoutMockery()
	{
		$file = new File;
		$generator = new Generator($file);

		$generator->fire();

		# once no exception is thrown, assert true
		$this->assertTrue(true);
	}

	public function testItWorksWithMockery()
	{
		$mockedFile = \Mockery::mock('App\File');

		$mockedFile->shouldReceive('put')
		->with('foo.txt', 'foo bar')
		->once();

		$mockedFile->shouldReceive('exists')
					->once()
					->andReturn(false);

		$generator = new Generator($mockedFile);
		$generator->fire();
	}


	public function testDoesNotOverwriteFile()
	{
		$mockedFile = \Mockery::mock('App\File');


		$mockedFile->shouldReceive('exists')
				->once()
				->andReturn(true);

		$mockedFile->shouldReceive('put')
					->never();

		$generator = new Generator($mockedFile);
		$generator->fire();
	}

}  