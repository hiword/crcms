<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('models', function(Blueprint $table)
		{
			$table->mediumInteger('id',true,true);
			$table->char('mark',30);
			$table->char('table_name',50);
			$table->char('name',100);
			$table->char('model_path',100);
			$table->char('field_path',100);
			$table->char('engine',30);
			$table->char('remark',255);
			
			$table->tinyInteger('is_created',false,true)->default(0);
			$table->tinyInteger('status',false,true)->default(0);
			$table->tinyInteger('type',false,true)->default(0);
			
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
