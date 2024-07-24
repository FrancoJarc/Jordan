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
        Schema::create('productos__talles', function (Blueprint $table) {
            $table->foreignId('productos_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('talles_id')->nullable()->constrained()->onDelete('cascade');
            $table->integer('stock');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos__talles');
    }
};
