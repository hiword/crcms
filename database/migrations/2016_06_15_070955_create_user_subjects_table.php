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
    		
    		$table->mediumInteger('subject_id',false,true)->default(0);
    		$table->mediumInteger('user_id',false,true)->default(0);
    		
    		$table->primary(['user_id','subject_id']);
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
