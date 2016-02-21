<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTagTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('tag_tag_types', function(Blueprint $table)
    	{
    		$table->mediumInteger('tag_id',false,true)->default(0);
    		$table->mediumInteger('type_id',false,true)->default(0);
    		$table->primary(['tag_id','type_id']);
//     		$table->mediumInteger('outside_id',false,true)->default(0);
//     		$table->char('outside_model',60);
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
    	Schema::drop('tag_tag_types');
    }
}
