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
        Schema::create('users_compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('talles_id')->constrained();
            $table->foreignId('productos_id')->constrained();
            $table->text('direccion');
            $table->foreignId('users_id')->constrained();
            $table->foreignId('metodo_de_pagos_id')->constrained()->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_compras');
    }
};
