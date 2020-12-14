<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            
            
            $table->string('title', 60);
            $table->string('text', 1000);
            $table->string('author', 30);
            $table->date('date');
            $table->timestamps();
            /*
            CREATE TRIGGER pre_enterprise_insert
            BEFORE INSERT ON enterprise FOR EACH ROW
            SET NEW.name = ucase(NEW.name);
            */
        });
        //  DB::unprepared('create trigger pre_post_insert
        //               before insert on post for each row
        //                 set new.title = ucase(new.title)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
