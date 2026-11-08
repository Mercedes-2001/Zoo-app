<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabla: employees (fk_turno, fk_jefe)
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['fk_turno']);
            $table->dropForeign(['fk_jefe']);
            $table->unsignedBigInteger('fk_turno')->nullable()->change();
            $table->unsignedBigInteger('fk_jefe')->nullable()->change();
            $table->foreign('fk_turno')->references('cod_turno')->on('turns')->onDelete('set null');
            $table->foreign('fk_jefe')->references('num_trabajador')->on('employees')->onDelete('set null');
        });

        // Tabla: food (fk_prov)
        Schema::table('food', function (Blueprint $table) {
            $table->dropForeign(['fk_prov']);
            $table->string('fk_prov', 20)->nullable()->change();
            $table->foreign('fk_prov')->references('rfc')->on('suppliers')->onDelete('set null');
        });

        // Tabla: lots (fk_alimento)
        Schema::table('lots', function (Blueprint $table) {
            $table->dropForeign(['fk_alimento']);
            $table->unsignedBigInteger('fk_alimento')->nullable()->change();
            $table->foreign('fk_alimento')->references('cod_alim')->on('food')->onDelete('set null');
        });

        // Tabla: empturns (fk_turno, fk_empleado)
        Schema::table('empturns', function (Blueprint $table) {
            $table->dropForeign(['fk_turno']);
            $table->dropForeign(['fk_empleado']);
            $table->unsignedBigInteger('fk_turno')->nullable()->change();
            $table->unsignedBigInteger('fk_empleado')->nullable()->change();
            $table->foreign('fk_turno')->references('cod_turno')->on('turns')->onDelete('set null');
            $table->foreign('fk_empleado')->references('num_trabajador')->on('employees')->onDelete('set null');
        });

        // Tabla: animals (fk_especie, fk_zona, fk_nombre_zona)
        Schema::table('animals', function (Blueprint $table) {
            $table->dropForeign(['fk_especie']);
            $table->dropForeign(['fk_zona', 'fk_nombre_zona']);
            $table->unsignedBigInteger('fk_especie')->nullable()->change();
            $table->unsignedBigInteger('fk_zona')->nullable()->change();
            $table->string('fk_nombre_zona')->nullable()->change();
            $table->foreign('fk_especie')->references('id_esp')->on('species')->onDelete('set null');
            $table->foreign(['fk_zona', 'fk_nombre_zona'])->references(['id_zona', 'nombre_zona'])->on('zones')->onDelete('set null');
        });

        // Tabla: cares (fk_alimento, fk_empleado, fk_animal)
        Schema::table('cares', function (Blueprint $table) {
            $table->dropForeign(['fk_alimento']);
            $table->dropForeign(['fk_empleado']);
            $table->dropForeign(['fk_animal']);
            $table->unsignedBigInteger('fk_alimento')->nullable()->change();
            $table->unsignedBigInteger('fk_empleado')->nullable()->change();
            $table->unsignedBigInteger('fk_animal')->nullable()->change();
            $table->foreign('fk_alimento')->references('cod_alim')->on('food')->onDelete('set null');
            $table->foreign('fk_empleado')->references('num_trabajador')->on('employees')->onDelete('set null');
            $table->foreign('fk_animal')->references('id_ani')->on('animals')->onDelete('set null');
        });
    }

    public function down(): void
    {
        // Tabla: employees
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['fk_turno']);
            $table->dropForeign(['fk_jefe']);
            $table->unsignedBigInteger('fk_turno')->nullable(false)->change();
            $table->unsignedBigInteger('fk_jefe')->nullable()->change(); // sigue siendo nullable
            $table->foreign('fk_turno')->references('cod_turno')->on('turns')->onDelete('cascade');
            $table->foreign('fk_jefe')->references('num_trabajador')->on('employees')->onDelete('cascade');
        });

        // Tabla: food
        Schema::table('food', function (Blueprint $table) {
            $table->dropForeign(['fk_prov']);
            $table->string('fk_prov', 20)->nullable(false)->change();
            $table->foreign('fk_prov')->references('rfc')->on('suppliers')->onDelete('cascade');
        });

        // Tabla: lots
        Schema::table('lots', function (Blueprint $table) {
            $table->dropForeign(['fk_alimento']);
            $table->unsignedBigInteger('fk_alimento')->nullable(false)->change();
            $table->foreign('fk_alimento')->references('cod_alim')->on('food')->onDelete('cascade');
        });

        // Tabla: empturns
        Schema::table('empturns', function (Blueprint $table) {
            $table->dropForeign(['fk_turno']);
            $table->dropForeign(['fk_empleado']);
            $table->unsignedBigInteger('fk_turno')->nullable(false)->change();
            $table->unsignedBigInteger('fk_empleado')->nullable(false)->change();
            $table->foreign('fk_turno')->references('cod_turno')->on('turns')->onDelete('cascade');
            $table->foreign('fk_empleado')->references('num_trabajador')->on('employees')->onDelete('cascade');
        });

        // Tabla: animals
        Schema::table('animals', function (Blueprint $table) {
            $table->dropForeign(['fk_especie']);
            $table->dropForeign(['fk_zona', 'fk_nombre_zona']);
            $table->unsignedBigInteger('fk_especie')->nullable(false)->change();
            $table->unsignedBigInteger('fk_zona')->nullable(false)->change();
            $table->string('fk_nombre_zona')->nullable(false)->change();
            $table->foreign('fk_especie')->references('id_esp')->on('species')->onDelete('cascade');
            $table->foreign(['fk_zona', 'fk_nombre_zona'])->references(['id_zona', 'nombre_zona'])->on('zones')->onDelete('cascade');
        });

        // Tabla: cares
        Schema::table('cares', function (Blueprint $table) {
            $table->dropForeign(['fk_alimento']);
            $table->dropForeign(['fk_empleado']);
            $table->dropForeign(['fk_animal']);
            $table->unsignedBigInteger('fk_alimento')->nullable(false)->change();
            $table->unsignedBigInteger('fk_empleado')->nullable(false)->change();
            $table->unsignedBigInteger('fk_animal')->nullable(false)->change();
            $table->foreign('fk_alimento')->references('cod_alim')->on('food')->onDelete('cascade');
            $table->foreign('fk_empleado')->references('num_trabajador')->on('employees')->onDelete('cascade');
            $table->foreign('fk_animal')->references('id_ani')->on('animals')->onDelete('cascade');
        });
    }

};
