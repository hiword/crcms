<?php

/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/25
 * Time: 12:28
 */
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Discuss extends TestCase
{

//    public function userDataProvider()
//    {
//        return [
//          'name'=>'fdasfsdfada',
//            'password'=>'123456',
//        ];
//    }

    /**
     *
     */
    public function testStore()
    {
        $this->post('/discuss',[
            'title'=>str_random(10),
            'content'=>str_random(30),
        ]);
    }

    /**
     * @depends testLogin
     * @param \Simon\User\Models\User $user
     */
    public function testAuthLog(\Simon\User\Models\User $user)
    {
        auth_logger(2,$user);
    }

}