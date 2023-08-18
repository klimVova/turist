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
        Schema::create('consulting_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('user_email')->nullable();
            $table->string('cat_id')->nullable();
            $table->string('address');
            $table->string('preview_image')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->index('user_id', 'consulting_card_user_idx');
            $table->foreign('user_id', 'consulting_card_user_fk')->on('users')->references('id');

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
        Schema::dropIfExists('consulting_posts');
    }
};
