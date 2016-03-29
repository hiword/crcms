<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('categorys', function(Blueprint $table)
    	{
    		$table->mediumInteger('id',true,true);
    		$table->mediumInteger('pid',false,true);
    		$table->char('name',100);
    		$table->char('mark',50);
    		$table->tinyInteger('status',false,true)->default(0);
    	
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
    	Schema::drop('categorys');
    }
}
