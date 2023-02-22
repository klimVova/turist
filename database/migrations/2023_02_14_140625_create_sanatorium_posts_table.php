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
        Schema::create('sanatorium_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->integer('price');
            $table->unsignedBigInteger('sanatorium_category_id')->nullable();
            $table->timestamps();
            $table->index('sanatorium_category_id', 'sanatorium_post_category_idx');
            $table->foreign('sanatorium_category_id', 'sanatorium_post_category_fk')->on('sanatorium_categories')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanatorium_posts');
    }
};
