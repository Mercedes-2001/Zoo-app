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
        Schema::create('cares', function (Blueprint $table) {
            $table->id('id_cuidados');
            $table->date('fecha_inicio_cuidado');
            $table->time('hora_cuidado');
            $table->string('tratamiento')->nullable();
            $table->integer('cantidad_alimento')->nullable();
            $table->unsignedBigInteger('fk_alimento');
            $table->unsignedBigInteger('fk_empleado');
            $table->unsignedBigInteger('fk_animal');
            $table->foreign('fk_alimento')->references('cod_alim')->on('food')->onDelete('cascade');
            $table->foreign('fk_empleado')->references('num_trabajador')->on('employees')->onDelete('cascade');
            $table->foreign('fk_animal')->references('id_ani')->on('animals')->onDelete('cascade');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cares');
    }
};
