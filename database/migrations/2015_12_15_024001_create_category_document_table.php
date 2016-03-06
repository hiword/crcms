<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('category_documents', function(Blueprint $table)
    	{
    		$table->mediumInteger('category_id',false,true)->default(0);
    		$table->mediumInteger('document_id',false,true)->default(0);
    		$table->unique(['category_id','document_id']);
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
