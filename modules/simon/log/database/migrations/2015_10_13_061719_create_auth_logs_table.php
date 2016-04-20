<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('auth_logs', function(Blueprint $table)
    	{
    		$table->mediumInteger('id',true,true);
    		$table->mediumInteger('userid',false,true);
    		$table->string('name',30);
    		$table->string('email',40);
    		$table->string('url',255);
    		$table->bigInteger('client_ip',false,true)->default(0);
    		
    		$table->tinyInteger('type',false,true)->default(0);
    		$table->tinyInteger('status',false,true)->default(0);
    		
    		$table->string('login_type',30);
    		
    		$table->tinyInteger('created_type',false,true)->default(0);
    		$table->tinyInteger('updated_type',false,true)->default(0);
    		$table->tinyInteger('deleted_type',false,true)->default(0);
    	
    		$table->mediumInteger('created_uid',false,true)->default(0);
    		$table->mediumInteger('updated_uid',false,true)->default(0);
    		$table->mediumInteger('deleted_uid',false,true)->default(0);
    	
    		$table->unsignedInteger('created_at')->default(0);
    		$table->unsignedInteger('updated_at')->default(0);
    		$table->unsignedInteger('deleted_at')->default(0);
    			
    		$table->index(array('created_uid','created_type'),'users');
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
    	Schema::drop('login_logs');
    }
}
