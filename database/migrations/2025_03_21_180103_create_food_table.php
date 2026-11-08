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
        Schema::create('food', function (Blueprint $table) {
            $table->id('cod_alim');
	        $table->string('nom_alim', 50);
	        $table->decimal('peso_alim', 7,3);
            $table->string('contenido_alim');
            $table->decimal('cant_total', 7,3);
            $table->decimal('costo', 7,2);
            $table->string('fk_prov', 20);
            $table->timestamps();
	   
            $table->foreign('fk_prov')->references('rfc')->on('suppliers')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
