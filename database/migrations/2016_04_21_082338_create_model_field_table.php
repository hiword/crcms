<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('model_fields', function(Blueprint $table)
    	{
    		$table->unsignedInteger('model_id')->default(0);
    		$table->unsignedInteger('field_id')->default(0);//需要继承的主模型id
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
    	Schema::drop('model_fields');
    }
}
