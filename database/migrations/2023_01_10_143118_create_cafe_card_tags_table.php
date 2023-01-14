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
        Schema::create('cafe_card_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cafe_card_id');
            $table->unsignedBigInteger('cafe_tag_id');
            $table->timestamps();

            $table->index('cafe_card_id', 'cafe_card_tag_card_idx');
            $table->index('cafe_tag_id', 'cafe_card_tag_tag_idx');

            $table->foreign('cafe_card_id', 'cafe_card_tag_card_fk')->on('cafe_cards')->references('id');
            $table->foreign('cafe_tag_id', 'cafe_card_tag_tag_fk')->on('cafe_tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cafe_card_tags');
    }
};
