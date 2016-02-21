<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('admins', function (Blueprint $table) {
    		$table->increments('id');
    		$table->char('name',12)->unique();
    		$table->char('password', 60);
    	
    		$table->tinyInteger('status',false,true)->default(0);//状态
    		
    		$table->unsignedInteger('register_time')->default(0);
    		$table->unsignedBigInteger('register_ip')->default(0);
    		$table->unsignedInteger('login_time')->default(0);
    		$table->unsignedBigInteger('login_ip')->default(0);
    		 
    		$table->tinyInteger('created_type',false,true)->default(0);
    		$table->tinyInteger('updated_type',false,true)->default(0);
    		$table->tinyInteger('deleted_type',false,true)->default(0);
    		 
    		$table->unsignedInteger('created_at')->default(0);
    		$table->unsignedInteger('updated_at')->default(0);
    		$table->unsignedInteger('deleted_at')->default(0);
    		 
    		$table->mediumInteger('created_uid',false,true)->default(0);
    		$table->mediumInteger('updated_uid',false,true)->default(0);
    		$table->mediumInteger('deleted_uid',false,true)->default(0);
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
    	Schema::drop('admins');
    }
}
