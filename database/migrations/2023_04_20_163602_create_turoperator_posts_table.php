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
        Schema::create('turoperator_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->integer('price');
            $table->unsignedBigInteger('turoperator_category_id')->nullable();
            $table->timestamps();
            $table->index('turoperator_category_id', 'turoperator_post_category_idx');
            $table->foreign('turoperator_category_id', 'turoperator_post_category_fk')->on('turoperator_categories')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turoperator_posts');
    }
};
