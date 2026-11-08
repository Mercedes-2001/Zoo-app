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
        Schema::create('lots', function (Blueprint $table) {
            $table->id('cod_lote');
	        $table->date('fecha_caduc');
            $table->decimal('porcion', 5,2);
            $table->date('fecha_compra');
            $table->unsignedBigInteger('fk_alimento');
            $table->timestamps();

	        $table->foreign('fk_alimento')->references('cod_alim')->on('food')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lots');
    }
};
