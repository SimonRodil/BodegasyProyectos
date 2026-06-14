<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('shortcut')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->dateTime('to_publish')->nullable();
            $table->foreignId('asesor')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
