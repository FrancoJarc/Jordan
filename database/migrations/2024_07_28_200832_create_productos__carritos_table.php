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
        Schema::create('productos__carritos', function (Blueprint $table) {
            $table->foreignId('carritos_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('productos_id')->constrained()->onDelete('cascade');
            $table->integer('cantidad')->default(1); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos__carritos');
    }
};
