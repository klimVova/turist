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
        Schema::table('cafe_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('catalog_id')->nullable();
            $table->index('catalog_id', 'cafe_categories_catalog_idx');
            $table->foreign('catalog_id', 'cafe_categories_catalog_fk')->on('cafe_catalogs')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cafe_categories', function (Blueprint $table) {
            $table->dropForeign('cafe_categories_catalog_fk');
            $table->dropColumn('catalog_id');
        });
    }
};
