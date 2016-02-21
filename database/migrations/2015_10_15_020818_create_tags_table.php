<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	//
    	Schema::create('tags', function(Blueprint $table)
    	{
    		$table->mediumInteger('id',true,true);
    		
    		$table->char('name',50)->unique();
    		$table->char('thumbnail',150);
//     		$table->tinyInteger('type_id',false,true)->default(0);
    		$table->tinyInteger('status',false,true)->default(0);
//     		$table->mediumInteger('category_id',false,true)->default(0);//标签类别
    		
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
    	Schema::drop('tags');
    }
}
