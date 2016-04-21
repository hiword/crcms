<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('fields', function(Blueprint $table)
		{
			$table->mediumInteger('id',true,true);
			$table->mediumInteger('model_id',false,true);//model_id
			$table->char('name',30);
			$table->char('alias',50);
			$table->char('tip',255);
			$table->char('type',30);
			$table->text('validate_rule');
			$table->text('attribute');
			$table->text('setting');//表单配置 包括titletip  //表单项
			$table->tinyInteger('is_primary',false,true)->default(0);
			$table->tinyInteger('status',false,true)->default(0);
			$table->smallInteger('sort',false,true)->default(0);
				
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
