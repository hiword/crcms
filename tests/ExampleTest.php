<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Simon\Model\Fields\Option\Radio;
use Simon\Model\Fields\Option\Multiselect;
use function Symfony\Component\Debug\header;
use Illuminate\Support\Facades\DB;

class ExampleTest extends TestCase
{
	
	
    /**
     * A basic functional test example.
     *
     * @return void
     */
//     public function testBasicExample()
//     {
//         $this->visit('/')
//              ->see('Laravel 5');
//     }
    
//     public function testRadio()
//     {
//     	$model = app('Simon\Model\Models\Model');
//     	$model = $model->find(13);
//     	$field = app('Simon\Model\Models\Field')->find(26);
    	
//     	$radio = new Radio($field,$model);
//     	$b = $radio->show('value1');
//     	dd($b);
//     }
    
    public function testSelect()
    {
    	DB::connection()->enableQueryLog(); // 开启查询日志
    	$model = app('Simon\Model\Models\Model');
    	$model = $model->find(15);
    	$field = app('Simon\Model\Models\Field')->find(29);
    	$select = new Multiselect($field,$model);
    	$b = $select->show([6,7],3);
    	dd($b);
    }
}
