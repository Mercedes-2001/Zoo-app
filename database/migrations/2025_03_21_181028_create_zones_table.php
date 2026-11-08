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
        Schema::create('zones', function (Blueprint $table) {
            $table->id('id_zona');
            $table->string('nombre_zona');
            $table->string('ubicacion');
            $table->integer('capacidad');
            $table->string('tipo_zona');
            $table->string('clima');
            $table->enum('status', ['ACTIVA', 'INACTIVA']);
            $table->primary(['id_zona', 'nombre_zona']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zones');
    }
};
