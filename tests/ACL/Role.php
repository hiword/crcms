<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Authorize extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
//    public function testBasicExample()
//    {
//        $this->visit('/')
//             ->see('Laravel');
//    }


    public function testData()
    {

        $data = [];
        $data['name'] = str_random(10);
        $data['remark']= str_random(30);
        $data['app_id'] = 1;
        $data['status'] = 1;

        return $data;
    }

    /**
     * @depends testData
     */
//    public function testStore(array $data)
//    {
//        $data['_method'] = 'POST';
//        $response = $this->call('POST','manage/acl/roles',$data);
//
//
//        dd($response->getStatusCode(),$response->getContent());
//        $response->assertResponseOk(302);
//
////        $this->assertEquals(200,$response->getStatus());
////        $response->assert
////        dd($response);
////        dd($response->visit());
//    }

    /**
     * @depends testData
     */
//    public function testUpdate(array $data)
//    {
//
//        $id = 1;
////        $data['name'] = '';
//        $data['name'] = str_random(30);
//        $data['remark']= str_random(30);
//        $data['app_id'] = 2;
//        $data['status'] = 2;
//
//        $response = $this->call('PUT','manage/acl/roles/'.$id,$data);
//
//        dd($response->getStatusCode(),$response->getContent());
//    }

    /**
     *
     */
//    public function testDestroys()
//    {
//        $id = '1,2,3,4';
//        $data = [];
//        $data['_method'] = 'DELETE';
//
//        $response = $this->call('DELETE','manage/acl/roles/'.$id);
//
//        dd($response->getStatusCode(),$response->getContent());
//    }
}


