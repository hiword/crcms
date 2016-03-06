<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileDatasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('file_datas', function(Blueprint $table)
		{
			$table->mediumInteger('fid',false,true)->primary();
			
			$table->bigInteger('server_ip',false,true)->default(0);
			$table->string('domain',40);
			$table->char('hash',40);
			$table->string('extension',30);
			$table->string('mime_type',70);
			$table->string('save_path',255);
			
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
