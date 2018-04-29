<?php
 
use PHPUnit\Framework\TestCase;

class PracticeTest extends TestCase {
	

	public function testHelloWorld()
	{
		$greeting = 'Good day';

		$this->assertTrue($greeting == 'Good day');
	}
}