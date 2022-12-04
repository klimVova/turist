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
        Schema::create('hostel_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->integer('price');
            $table->unsignedBigInteger('hostel_category_id')->nullable();
            $table->timestamps();
            $table->index('hostel_category_id', 'hostel_post_category_idx');
            $table->foreign('hostel_category_id', 'hostel_post_category_fk')->on('hostel_categories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hostel_posts');
    }
};
