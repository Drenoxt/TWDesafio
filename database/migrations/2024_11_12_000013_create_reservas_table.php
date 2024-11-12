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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('sala_id')->constrained('salas')->onDelete('cascade');
            $table->date('fecha');
            $table->foreignId('bloque_id')->constrained('bloque_horarios')->onDelete('cascade');
            $table->foreignId('estado_id')->constrained('estado_reservas')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['sala_id', 'fecha', 'bloque_id']);
        });               
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
