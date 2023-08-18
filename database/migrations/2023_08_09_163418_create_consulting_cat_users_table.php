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
        Schema::create('consulting_cat_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cat_id');
            $table->timestamps();


            $table->index('user_id', 'user_id_user_idx');
            $table->index('cat_id', 'cat_user_cat_idx');

            $table->foreign('user_id', 'user_id_user_fk')->on('users')->references('id');
            $table->foreign('cat_id', 'cat_user_cat_fk')->on('consulting_cats')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consulting_cat_users');
    }
};
