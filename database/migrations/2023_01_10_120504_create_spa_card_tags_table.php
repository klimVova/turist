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
        Schema::create('spa_card_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spa_card_id');
            $table->unsignedBigInteger('spa_tag_id');
            $table->timestamps();

            $table->index('spa_card_id', 'spa_card_tag_card_idx');
            $table->index('spa_tag_id', 'spa_card_tag_tag_idx');

            $table->foreign('spa_card_id', 'spa_card_tag_card_fk')->on('spa_cards')->references('id');
            $table->foreign('spa_tag_id', 'spa_card_tag_tag_fk')->on('spa_tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spa_card_tags');
    }
};
