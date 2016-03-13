<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('user_groups', function(Blueprint $table)
    	{
    		$table->mediumInteger('id',true,true);
    		$table->mediumInteger('user_id',false,true)->default(0);
    		$table->mediumInteger('group_id',false,true)->default(0);
    		$table->char('outside_type',60);
    		
    		$table->unique(['user_id','group_id','outside_type']);
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
    	Schema::drop('user_groups');
    }
}
