<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('subjects', function(Blueprint $table)
    	{
    		
    		$table->unsignedMediumInteger('id',true);
    		$table->string('title',120);
    		$table->text('content');
    		$table->string('answer',512);
    		$table->string('file',255);
    		
    		$table->smallInteger('score',false,true)->default(0);//审核状态
    		
    		$table->unsignedMediumInteger('sort')->default(0);
    		
    		$table->tinyInteger('status',false,true)->default(0);//审核状态
			
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
