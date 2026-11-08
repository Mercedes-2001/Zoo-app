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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('num_trabajador');
            $table->string('nom', 50);
            $table->string('nom_s', 50)->nullable();
            $table->string('apat', 50);
            $table->string('apmat', 50);
            $table->integer('edad');
            $table->enum('sexo', ['M', 'H', 'Otro']);
            $table->enum('tipo_em', ['Cuidador', 'Limpieza', 'Administrativo']);
            $table->unsignedBigInteger('fk_turno');
            $table->unsignedBigInteger('fk_jefe')->nullable();
            $table->timestamps();
        
            // Claves foráneas
            $table->foreign('fk_turno')->references('cod_turno')->on('turns')->onDelete('cascade');
            $table->foreign('fk_jefe')->references('num_trabajador')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
