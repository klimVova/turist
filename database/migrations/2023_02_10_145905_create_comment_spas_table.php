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
        Schema::create('comment_spas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spaCard_id');
            $table-> text('message');
            $table-> text('user_name');
            $table->index('spaCard_id', 'spa_card_comment_idx');
            $table->foreign('spaCard_id', 'spa_card_comment_fk')->on('spa_cards')->references('id');
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
        Schema::dropIfExists('comment_spas');
    }
};
