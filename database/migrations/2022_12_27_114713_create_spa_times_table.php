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
        Schema::create('spa_times', function (Blueprint $table) {
            $table->id();
            $table->string('time_start');
            $table->string('time_end');
            $table->string('time_date');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id', 'spa_times_user_idx');
            $table->foreign('user_id', 'spa_times_user_fk')->on('users')->references('id');
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
        Schema::table('spa_times', function (Blueprint $table) {
            $table->dropForeign('spa_times_user_fk');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('spa_times');
    }
};
