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
        Schema::create('data', function (Blueprint $table) {
            $table->unsignedBigInteger('num_trabajador'); // Clave primaria y foránea
            $table->string('tel', 20);
            $table->string('correo_elec', 100);
            $table->string('calle', 100);
            $table->string('col', 100);
            $table->string('cp', 20);
            $table->string('n_I', 10)->nullable();
            $table->string('n_E', 10);
            $table->string('estado', 100);
            $table->timestamps();        
            // Clave primaria por recursividad
            $table->primary('num_trabajador');        
            // Clave foránea
            $table->foreign('num_trabajador')->references('num_trabajador')->on('employees')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
