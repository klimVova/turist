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
        Schema::create('sanatorium_card_tag_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sanatorium_card_id');
            $table->unsignedBigInteger('sanatorium_cardTag_id');
            $table->timestamps();

            $table->index('sanatorium_card_id', 'sanatorium_card_cardTag_card_idx');
            $table->index('sanatorium_cardTag_id', 'sanatorium_card_cardTag_tag_idx');

            $table->foreign('sanatorium_card_id', 'sanatorium_card_cardTag_card_fk')->on('sanatorium_card_tag_cards')->references('id');
            $table->foreign('sanatorium_cardTag_id', 'sanatorium_card_cardTag_tag_fk')->on('sanatorium_card_tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanatorium_card_tag_cards');
    }
};
