<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('files', function(Blueprint $table)
		{
			$table->mediumInteger('id',true,true);
			$table->char('old_name',100);
			$table->char('new_name',50);
			$table->char('hash',40);
			$table->char('full_path',255);
			$table->char('full_root',255);
			$table->char('mark',30)->index();
			$table->mediumInteger('port',false,true)->default(0);
			$table->bigInteger('filesize',false,true)->default(0);
			$table->bigInteger('client_ip',false,true)->default(0);
			$table->char('scheme',15);
			$table->char('domain',40);
			$table->char('full_domain',255);
			
			$table->char('upload_time',20)->default(0);
			
			$table->tinyInteger('created_type',false,true)->default(0);
			$table->tinyInteger('updated_type',false,true)->default(0);
			$table->tinyInteger('deleted_type',false,true)->default(0);
			
			$table->mediumInteger('created_uid',false,true)->default(0);
			$table->mediumInteger('updated_uid',false,true)->default(0);
			$table->mediumInteger('deleted_uid',false,true)->default(0);
			
			$table->unsignedInteger('created_at')->default(0);
			$table->unsignedInteger('updated_at')->default(0);
			$table->unsignedInteger('deleted_at')->default(0);
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
