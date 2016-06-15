<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('user_datas', function (Blueprint $table) {
    		$table->mediumInteger('uid',false,true)->primary();
    		$table->char('homepage',100);
    		$table->tinyInteger('sex',false,true)->default(0);
    		$table->integer('birthday',false,true)->default(0);
    		$table->char('description',255);//简介
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
