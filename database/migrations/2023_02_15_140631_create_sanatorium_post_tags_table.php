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
        Schema::create('sanatorium_post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sanatorium_post_id');
            $table->unsignedBigInteger('sanatorium_tag_id');
            $table->timestamps();

            $table->index('sanatorium_post_id', 'sanatorium_post_tag_post_idx');
            $table->index('sanatorium_tag_id', 'sanatorium_post_tag_tag_idx');

            $table->foreign('sanatorium_post_id', 'sanatorium_post_tag_post_fk')->on('sanatorium_posts')->references('id');
            $table->foreign('sanatorium_tag_id', 'sanatorium_post_tag_tag_fk')->on('sanatorium_tags')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanatorium_post_tags');
    }
};
