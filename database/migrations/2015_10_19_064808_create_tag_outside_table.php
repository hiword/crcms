<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagOutsideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('tag_outsides', function(Blueprint $table)
    	{
    		$table->mediumInteger('tag_id',false,true)->default(0);
    		$table->mediumInteger('outside_id',false,true)->default(0);
    		$table->char('outside_type',60);
    		$table->primary(['tag_id','outside_id','outside_type']);
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
