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
        Schema::create('turoperator_card_tag_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turoperator_card_id');
            $table->unsignedBigInteger('turoperator_cardTag_id');
            $table->timestamps();

            $table->index('turoperator_card_id', 'turoperator_card_cardTag_card_idx');
            $table->index('turoperator_cardTag_id', 'turoperator_card_cardTag_tag_idx');

            $table->foreign('turoperator_card_id', 'turoperator_card_cardTag_card_fk')->on('turoperator_card_tag_cards')->references('id');
            $table->foreign('turoperator_cardTag_id', 'turoperator_card_cardTag_tag_fk')->on('turoperator_card_tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turoperator_card_tag_cards');
    }
};
