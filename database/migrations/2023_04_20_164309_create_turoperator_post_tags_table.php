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
        Schema::create('turoperator_post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turoperator_post_id');
            $table->unsignedBigInteger('turoperator_tag_id');
            $table->timestamps();

            $table->index('turoperator_post_id', 'turoperator_post_tag_post_idx');
            $table->index('turoperator_tag_id', 'turoperator_post_tag_tag_idx');

            $table->foreign('turoperator_post_id', 'turoperator_post_tag_post_fk')->on('turoperator_posts')->references('id');
            $table->foreign('turoperator_tag_id', 'turoperator_post_tag_tag_fk')->on('turoperator_tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turoperator_post_tags');
    }
};
