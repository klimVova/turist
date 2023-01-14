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
        Schema::create('medical_card_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_card_id');
            $table->unsignedBigInteger('medical_tag_id');
            $table->timestamps();

            $table->index('medical_card_id', 'medical_card_tag_card_idx');
            $table->index('medical_tag_id', 'medical_card_tag_tag_idx');

            $table->foreign('medical_card_id', 'medical_card_tag_card_fk')->on('medical_cards')->references('id');
            $table->foreign('medical_tag_id', 'medical_card_tag_tag_fk')->on('medical_tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_card_tags');
    }
};
