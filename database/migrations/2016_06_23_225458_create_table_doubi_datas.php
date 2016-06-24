<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDoubiDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	
    	Schema::create('doubi_datas', function(Blueprint $table)
    	{
    		$table->unsignedInteger('did',false)->default(0)->pirmary();
    		$table->text('content');
    		$table->char('seo_intro',255);
    		$table->char('seo_keyword',150);
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
