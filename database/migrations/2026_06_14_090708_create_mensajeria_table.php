<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mensajeria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asesor')->constrained('users')->onDelete('cascade');
            $table->string('nombre');
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->text('mensaje');
            $table->foreignId('propiedad')->constrained('propiedades')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mensajeria');
    }
};
