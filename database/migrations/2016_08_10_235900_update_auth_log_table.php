<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAuthLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auth_logs', function (Blueprint $table) {
            //
            $table->dropColumn('password');
            $table->unsignedInteger('userid')->default(0);
            $table->tinyInteger('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auth_logs', function (Blueprint $table) {
            //
        });
    }
}
