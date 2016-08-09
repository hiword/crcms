<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use User\Services\Register as RegisterService;
use User\Models\User;

class Register extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
   /*  public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel 5');
    } */
	
// 	public function testPostRegister()
// 	{
// 		$response = $this->post('/auth/register',['code'=>'1234','name'=>'abc3210','password'=>'123456']);
// 		$this->assertResponseOk();
// 		dd($response->getStatusMessage());
// 	}
	
	public function testopenImageCodeVerify()
	{
	    $Register = new RegisterService(new User());
	    $Register->verifyRegisterTimeInterval();
	}
}
