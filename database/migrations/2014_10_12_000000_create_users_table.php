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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('republic_id')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->index('city_id', 'user_city_idx');
            $table->foreign('city_id', 'user_city_fk')->on('cities')->references('id');

            $table->index('republic_id', 'user_republic_idx');
            $table->foreign('republic_id', 'user_republic_fk')->on('republics')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('user_city_fk');
            $table->dropColumn('city_id');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('user_republic_fk');
            $table->dropColumn('republic_id');
        });
        Schema::dropIfExists('users');
    }
};
