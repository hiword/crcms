<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('comments', function(Blueprint $table)
		{
			$table->mediumInteger('id',true,true);
			
			$table->mediumInteger('reply_id',false,true)->default(0);
			
			$table->char('outside_type',50);
			$table->mediumInteger('outside_id',false,true)->default(0);
			
			$table->unsignedBigInteger('client_ip')->default(0);
			$table->tinyInteger('status',false,true)->default(0);//审核状态
			
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
