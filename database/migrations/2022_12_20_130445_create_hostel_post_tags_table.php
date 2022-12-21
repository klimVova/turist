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
        Schema::create('hostel_post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hostel_post_id');
            $table->unsignedBigInteger('hostel_tag_id');
            $table->timestamps();

            $table->index('hostel_post_id', 'hostel_post_tag_post_idx');
            $table->index('hostel_tag_id', 'hostel_post_tag_tag_idx');

            $table->foreign('hostel_post_id', 'hostel_post_tag_post_fk')->on('hostel_posts')->references('id');
            $table->foreign('hostel_tag_id', 'hostel_post_tag_tag_fk')->on('hostel_tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hostel_post_tags');
    }
};
