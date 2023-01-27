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
        Schema::create('hostel_card_tag_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hostel_card_id');
            $table->unsignedBigInteger('hostel_cardTag_id');
            $table->timestamps();

            $table->index('hostel_card_id', 'hostel_card_cardTag_card_idx');
            $table->index('hostel_cardTag_id', 'hostel_card_cardTag_tag_idx');

            $table->foreign('hostel_card_id', 'hostel_card_cardTag_card_fk')->on('hostel_card_tag_cards')->references('id');
            $table->foreign('hostel_cardTag_id', 'hostel_card_cardTag_tag_fk')->on('hostel_card_tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hostel_card_tag_cards');
    }
};
