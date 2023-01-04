<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionPostsTable extends Migration
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
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('url')->nullable();
            $table->string('sub_title')->nullable();
            $table->longText('post_content')->nullable();
            $table->string('image')->nullable();
            $table->string('background_image')->nullable();
            $table->string('tag')->nullable();
            $table->string('category')->nullable();
            $table->string('status')->nullable();
            $table->integer('sequence')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('created_by')->nullable();
            $table->string('creator')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('posts');
    }
}