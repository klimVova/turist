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
        Schema::create('sport_card_tag_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sport_card_id');
            $table->unsignedBigInteger('sport_cardTag_id');
            $table->timestamps();

            $table->index('sport_card_id', 'sport_card_cardTag_card_idx');
            $table->index('sport_cardTag_id', 'sport_card_cardTag_tag_idx');

            $table->foreign('sport_card_id', 'sport_card_cardTag_card_fk')->on('sport_card_tag_cards')->references('id');
            $table->foreign('sport_cardTag_id', 'sport_card_cardTag_tag_fk')->on('sport_card_tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_card_tag_cards');
    }
};
