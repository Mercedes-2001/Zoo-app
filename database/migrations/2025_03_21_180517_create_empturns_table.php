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
        Schema::create('empturns', function (Blueprint $table) {
            $table->id('cod_empturn');
	        $table->unsignedBigInteger('fk_turno');
            $table->unsignedBigInteger('fk_empleado');
	        $table->decimal('horas_trabajadas', 3,2);
            $table->string('motivo');  	
            $table->timestamps();

            $table->foreign('fk_turno')->references('cod_turno')->on('turns')->onDelete('cascade');
            $table->foreign('fk_empleado')->references('num_trabajador')->on('employees')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empturns');
    }
};
