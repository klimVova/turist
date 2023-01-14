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
        Schema::create('spa_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->string('desc');
            $table->string('link');
            $table->string('name_link');
            $table->string('address');
            $table->string('coordinate_l');
            $table->string('coordinate_r');
            $table->string('preview_image')->nullable();
            $table->string('logo')->nullable();
            $table->unsignedBigInteger('phone')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('republic_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();

            $table->index('user_id', 'spa_card_user_idx');
            $table->foreign('user_id', 'spa_card_user_fk')->on('users')->references('id');

            $table->index('type_id', 'spa_card_type_idx');
            $table->foreign('type_id', 'spa_card_type_fk')->on('types')->references('id');

            $table->index('district_id', 'spa_card_district_idx');
            $table->foreign('district_id', 'spa_card_district_fk')->on('districts')->references('id');

            $table->index('republic_id', 'spa_card_republic_idx');
            $table->foreign('republic_id', 'spa_card_republic_fk')->on('republics')->references('id');

            $table->index('city_id', 'spa_card_city_idx');
            $table->foreign('city_id', 'spa_card_city_fk')->on('cities')->references('id');

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
        Schema::dropIfExists('spa_cards');
    }
};
