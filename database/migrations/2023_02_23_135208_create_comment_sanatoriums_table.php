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
        Schema::create('comment_sanatoriums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sanatoriumCard_id');
            $table-> text('message');
            $table-> text('user_name');
            $table->index('sanatoriumCard_id', 'sanatorium_card_comment_idx');
            $table->foreign('sanatoriumCard_id', 'sanatorium_card_comment_fk')->on('sanatorium_cards')->references('id');
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
        Schema::dropIfExists('comment_sanatoriums');
    }
};
