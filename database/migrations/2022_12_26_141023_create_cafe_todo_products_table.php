<?php

use App\Models\CafeTodoItem;
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
        Schema::create('cafe_todo_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(CafeTodoItem::class)->nullable();
            $table->string('title');
            $table->string('price')->nullable();
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
        Schema::dropIfExists('cafe_todo_products');
    }
};
