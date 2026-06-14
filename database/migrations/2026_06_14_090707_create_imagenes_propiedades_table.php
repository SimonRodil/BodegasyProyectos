<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('imagenes_propiedades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('propiedad')->constrained('propiedades')->onDelete('cascade');
            $table->string('imagen');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imagenes_propiedades');
    }
};
