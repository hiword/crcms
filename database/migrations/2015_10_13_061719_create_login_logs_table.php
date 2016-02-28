<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('login_logs', function(Blueprint $table)
    	{
    		$table->mediumInteger('id',true,true);
    		$table->mediumInteger('userid',false,true);
    		$table->string('name',30);
    		$table->string('email',40);
    		$table->string('url',255);
    		$table->bigInteger('client_ip',false,true)->default(0);
    		$table->char('remark',255);
    		$table->tinyInteger('login_status',false,true)->default(0);
    			
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
