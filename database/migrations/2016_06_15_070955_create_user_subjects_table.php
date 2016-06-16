<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('user_subjects', function(Blueprint $table)
    	{
    		$table->unsignedMediumInteger('id',true);
    		$table->mediumInteger('subject_id',false,true)->default(0);
    		$table->mediumInteger('user_id',false,true)->default(0);
    		$table->mediumInteger('status',false,true)->default(0);//1正确2错误
    		$table->string('answer',512);
    		
    		$table->tinyInteger('created_type',false,true)->default(0);
    		$table->tinyInteger('updated_type',false,true)->default(0);
    		$table->tinyInteger('deleted_type',false,true)->default(0);
    			
    		$table->mediumInteger('created_uid',false,true)->default(0);
    		$table->mediumInteger('updated_uid',false,true)->default(0);
    		$table->mediumInteger('deleted_uid',false,true)->default(0);
    			
    		$table->unsignedInteger('created_at')->default(0);
    		$table->unsignedInteger('updated_at')->default(0);
    		$table->unsignedInteger('deleted_at')->default(0);
    		
    		$table->unique(['user_id','subject_id']);
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
