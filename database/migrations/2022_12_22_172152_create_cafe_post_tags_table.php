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
        Schema::create('cafe_post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cafe_post_id')->nullable();
            $table->unsignedBigInteger('cafe_tag_id')->nullable();

            $table->index('cafe_post_id', 'cafe_post_tag_post_idx');
            $table->index('cafe_tag_id', 'cafe_post_tag_tag_idx');

            $table->foreign('cafe_post_id', 'cafe_post_tag_post_fk')->on('cafe_posts')->references('id');
            $table->foreign('cafe_tag_id', 'cafe_post_tag_tag_fk')->on('cafe_tags')->references('id');
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
        Schema::dropIfExists('cafe_post_tags');
    }
};
