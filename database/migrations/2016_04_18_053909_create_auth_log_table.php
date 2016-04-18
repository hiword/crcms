<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('auth_logs', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('name');
    		$table->tinyInteger('status',false,true)->default(0);
    		$table->tinyInteger('type',false,true)->default(0);
    		$table->bigInteger('client_ip',false,true)->default(0);
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
    	Schema::drop('auth_logs');
    }
}
