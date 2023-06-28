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
        Schema::create('sport_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->integer('price');
            $table->unsignedBigInteger('sport_category_id')->nullable();
            $table->timestamps();
            $table->index('sport_category_id', 'sport_post_category_idx');
            $table->foreign('sport_category_id', 'sport_post_category_fk')->on('sport_categories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_posts');
    }
};
