<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_items', function (Blueprint $table) {
            $table->id();
            $table->integer('section_id')->nullable();
            $table->string('section_item_name', 200)->nullable();
            $table->string('section_item_value', 500)->nullable();
            $table->string('section_item_long_text', 2000)->nullable();
            $table->string('section_item_html', 1000)->nullable();
            $table->string('section_item_image', 200)->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('sequence')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('section_items');
    }
}