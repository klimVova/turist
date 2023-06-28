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
        Schema::create('sport_servics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id', 'sport_servic_user_idx');
            $table->foreign('user_id', 'sport_servic_user_fk')->on('users')->references('id');
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
        Schema::table('sport_servics', function (Blueprint $table) {
            $table->dropForeign('sport_servic_user_fk');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('sport_servics');
    }
};
