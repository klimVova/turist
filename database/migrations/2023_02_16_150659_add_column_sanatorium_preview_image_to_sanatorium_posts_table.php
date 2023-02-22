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
        Schema::table('sanatorium_posts', function (Blueprint $table) {
            $table->string('sanatorium_preview_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sanatorium_posts', function (Blueprint $table) {
            $table->dropColumn('sanatorium_preview_image');
        });
    }
};
