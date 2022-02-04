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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
            $table->string('slug'); //third step to create slug -- add column slug to database
            // fourth step add column slug into posts in database in phpmyadmin to insert slugs into
            //error:Call to undefined function App\Http\Controllers\str_slug() -- solve : composer require laravel/helpers
            // this slug will applay on title input  if enter 'Hello Laravel' stord in slug as 'hello-laravel'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
