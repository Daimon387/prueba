<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tela_id');
            $table->foreign('tela_id')->references('id')->on('tipotelas')->onDelete('cascade');
            $table->float('precio');
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colores')->onDelete('cascade');
            $table->float('metraje');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
