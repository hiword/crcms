<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('action_logs', function(Blueprint $table)
		{
			$table->mediumInteger('id',true,true);
			$table->string('remark',255);
			$table->string('url',512);
			$table->text('param');
			$table->string('user_agent',255);
			$table->string('scheme',10);
			$table->string('method',10);
			$table->string('device',30);
			$table->string('browser',30);
			$table->string('browser_version',30);
			$table->string('os',30);
			$table->string('os_version',30);
			$table->string('robot_name',30);
			$table->tinyInteger('is_robot',false,true)->default(0);//是否是机器人
			
			$table->mediumInteger('port',false,true)->default(0);
			$table->bigInteger('client_ip',false,true)->default(0);
			
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
		Schema::drop('action_logs');
	}

}
