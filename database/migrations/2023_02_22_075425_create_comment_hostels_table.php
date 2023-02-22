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
        Schema::create('comment_hostels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hostelCard_id');
            $table-> text('message');
            $table-> text('user_name');
            $table->index('hostelCard_id', 'hostel_card_comment_idx');
            $table->foreign('hostelCard_id', 'hostel_card_comment_fk')->on('hostel_cards')->references('id');
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
        Schema::dropIfExists('comment_hostels');
    }
};
