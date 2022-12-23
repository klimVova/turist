<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cafe_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('price');
            $table->unsignedBigInteger('cafe_catalog_id')->nullable();
            $table->unsignedBigInteger('cafe_category_id')->nullable();

            $table->index('cafe_catalog_id', 'cafe_post_catalog_idx');
            $table->foreign('cafe_catalog_id', 'cafe_post_catalog_fk')->on('cafe_catalogs')->references('id');

            $table->index('cafe_category_id', 'cafe_post_category_idx');
            $table->foreign('cafe_category_id', 'cafe_post_category_fk')->on('cafe_categories')->references('id');

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
        Schema::dropIfExists('cafe_posts');
    }
};
