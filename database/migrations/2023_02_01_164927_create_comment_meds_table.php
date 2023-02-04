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
        Schema::create('comment_meds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicalCard_id');
            $table-> text('message');
            $table-> text('user_name');
            $table->index('medicalCard_id', 'medical_card_comment_idx');
            $table->foreign('medicalCard_id', 'medical_card_comment_fk')->on('medical_cards')->references('id');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_meds');
    }
};
