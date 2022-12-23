<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *Название
    Адрес
    Время работы
    Номер телефона
    Фотогалерея ресторана/кафе

     * @return void
     */
    public function up()
    {
        Schema::create('cafe_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->string('address');
            $table->string('coordinate');
            $table->string('preview_image')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id', 'cafe_card_user_idx');
            $table->foreign('user_id', 'cafe_card_user_fk')->on('users')->references('id');
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
        Schema::dropIfExists('cafe_cards');
    }
};
