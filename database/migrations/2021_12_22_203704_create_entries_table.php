<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->decimal('value', 10,2);
            $table->integer('type_id')->unsigned(); 
            $table->foreign('type_id')->references('id')->on('types'); 
            $table->integer('category_id')->unsigned();  
            $table->foreign('category_id')->references('id')->on('categories'); 
            $table->string('description');
            $table->text('note')->nullable();
            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
