<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('groups', function(Blueprint $table)
    	{
    		$table->mediumInteger('id',true,true);
    		$table->char('name',50);
    		$table->char('remark',255);
    		$table->char('outside_type',60);
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
    	Schema::drop('groups');
    }
}
