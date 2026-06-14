<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo_propiedad')->nullable();
            $table->tinyInteger('tipo_oferta')->comment('1=Venta, 2=Arriendo');
            $table->string('banos')->nullable();
            $table->decimal('area', 10, 2)->nullable();
            $table->string('tamano_lote')->nullable();
            $table->year('ano')->nullable();
            $table->text('descripcion')->nullable();
            $table->foreignId('ciudad')->nullable()->constrained('ciudades')->nullOnDelete();
            $table->foreignId('barrio')->nullable()->constrained('barrios')->nullOnDelete();
            $table->string('imagen_destacada')->nullable();
            $table->string('direccion')->nullable();
            $table->foreignId('asesor')->nullable()->constrained('users')->nullOnDelete();
            $table->string('video')->nullable();
            $table->decimal('precio', 14, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('propiedades');
    }
};
