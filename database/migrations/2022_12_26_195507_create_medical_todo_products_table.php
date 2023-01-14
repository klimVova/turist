<?php

use App\Models\MedicalTodoItem;
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
        Schema::create('medical_todo_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MedicalTodoItem::class)->nullable();
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
        Schema::dropIfExists('medical_todo_products');
    }
};
