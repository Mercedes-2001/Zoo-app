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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->string('rfc', 20)->primary(); 
            $table->string('nom_prov', 50);
            $table->string('tel_prov', 20);
            $table->string('correo_prov'); 
            $table->string('calle_prov', 50); 
            $table->string('col_prov', 50);   
            $table->string('cp_prov', 10);    
            $table->string('numext_prov', 10);
            $table->string('numint_prov', 10)->nullable(); // Puede ser opcional
            $table->string('tipo_prov', 50);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
