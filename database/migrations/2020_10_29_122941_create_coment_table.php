<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //create table
    {
        Schema::create('coment', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('idpost')->unsigned();
            $table->string('text', 10000);
            $table->date('date');
            $table->string('email', 80);
            
            
            $table->foreign('idpost')->references ('id')->on('post');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //drop table
    {
        Schema::dropIfExists('coment');
    }
}
