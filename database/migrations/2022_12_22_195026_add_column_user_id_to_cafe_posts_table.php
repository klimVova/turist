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
        Schema::table('cafe_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id', 'cafe_post_user_idx');
            $table->foreign('user_id', 'cafe_post_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cafe_posts', function (Blueprint $table) {
            $table->dropForeign('cafe_post_user_fk');
            $table->dropColumn('user_id');
        });
    }
};
