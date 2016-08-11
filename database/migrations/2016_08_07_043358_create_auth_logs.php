<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthLogs extends Migration
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
            $table->char('name',30);
            $table->char('password',100);
            $table->unsignedBigInteger('client_ip');
            
            $table->tinyInteger('created_type',false,true)->default(0);
            $table->tinyInteger('updated_type',false,true)->default(0);
            $table->tinyInteger('deleted_type',false,true)->default(0);
             
            $table->mediumInteger('created_uid',false,true)->default(0);
            $table->mediumInteger('updated_uid',false,true)->default(0);
            $table->mediumInteger('deleted_uid',false,true)->default(0);
             
            $table->unsignedInteger('created_at')->default(0);
            $table->unsignedInteger('updated_at')->default(0);
            $table->unsignedInteger('deleted_at')->default(0);
            
            $table->dropColumn('password');
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
