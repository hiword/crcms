<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('permission_groups', function(Blueprint $table)
    	{
    		$table->mediumInteger('id',true,true);
    		$table->mediumInteger('permission_id',false,true)->default(0);
    		$table->mediumInteger('group_id',false,true)->default(0);
    		$table->char('outside_type',60);
    		
    		$table->unique(['permission_id','group_id','outside_type']);
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
    	Schema::drop('permission_groups');
    }
}
