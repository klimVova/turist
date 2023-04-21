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
        Schema::create('comment_turs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turCard_id');
            $table-> text('message');
            $table-> text('user_name');
            $table->index('turCard_id', 'tur_card_comment_idx');
            $table->foreign('turCard_id', 'tur_card_comment_fk')->on('turoperator_cards')->references('id');
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
        Schema::dropIfExists('comment_turs');
    }
};
