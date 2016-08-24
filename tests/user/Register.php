<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/24
 * Time: 11:27
 */
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Register extends TestCase
{

    public function testRegister()
    {
        $data = ['username'=>str_random(16),'password'=>'123456','email'=>str_random(15).'@qq.com'];
        $response = $this->post('auth/register',$data);
        dd($response->getStatusMessage());
    }

    /*
    public function testAbc()
    {
        $array = [];
        $this->assertEmpty($array);
    }*/

}