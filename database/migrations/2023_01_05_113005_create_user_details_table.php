<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('small_title')->nullable();
            $table->longText('small_description')->nullable();
            $table->string('user_profile')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('theme_color')->nullable();
            $table->string('biography_description')->nullable();
            $table->string('book_title')->nullable();
            $table->string('book_name')->nullable();
            $table->string('book_small_desc')->nullable();
            $table->string('book_image')->nullable();
            $table->string('book_summary')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
