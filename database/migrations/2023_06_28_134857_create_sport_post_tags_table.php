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
        Schema::create('sport_post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sport_post_id');
            $table->unsignedBigInteger('sport_tag_id');
            $table->timestamps();

            $table->index('sport_post_id', 'sport_post_tag_post_idx');
            $table->index('sport_tag_id', 'sport_post_tag_tag_idx');

            $table->foreign('sport_post_id', 'sport_post_tag_post_fk')->on('sport_posts')->references('id');
            $table->foreign('sport_tag_id', 'sport_post_tag_tag_fk')->on('sport_tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_post_tags');
    }
};
