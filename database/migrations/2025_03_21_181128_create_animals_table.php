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
        Schema::create('animals', function (Blueprint $table) {
            $table->id('id_ani');
            $table->string('nombre_ani');
            $table->integer('edad_ani');
            $table->decimal('peso_ani', 10, 3);
            $table->decimal('altura', 6, 2);
            $table->enum('sexo_ani', ['Hembra', 'Macho', 'Indistinto']);
            $table->date('fecha_nac');
            $table->string('descripcion_ani');
            $table->string('lugar_origen');
            $table->unsignedBigInteger('fk_especie');
            $table->unsignedBigInteger('fk_zona');
            $table->string('fk_nombre_zona');
            $table->foreign('fk_especie')->references('id_esp')->on('species')->onDelete('cascade');
            $table->foreign(['fk_zona', 'fk_nombre_zona'])->references(['id_zona', 'nombre_zona'])->on('zones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
