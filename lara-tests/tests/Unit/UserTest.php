<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
	protected $user;

	public function setUp()
	{
		parent::setUp();
		$this->user = new User;
	}
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHashesPasswordWhenSet()
    {
    	Hash::shouldReceive('make')->once()->andReturn('hashed');

    	$password = $this->user->password = 'mt_rand';
    	
        $this->assertSame('hashed', $this->user->password); 
    }

}
