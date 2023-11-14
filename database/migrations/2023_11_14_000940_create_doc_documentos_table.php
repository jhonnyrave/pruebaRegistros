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
        Schema::create('doc_documentos', function (Blueprint $table) {
            $table->id('doc_id');
            $table->string('doc_nombre', 60);
            $table->string('doc_codigo',20);
            $table->string('doc_contenido', 4000);
            $table->unsignedBigInteger('doc_id_tipo');
            $table->unsignedBigInteger('doc_id_proceso');
            $table->timestamps();

            // relacion con las otras tablas
            $table->foreign('doc_id_tipo')->references('tip_id')->on('tip_tipo_documentos');
            $table->foreign('doc_id_proceso')->references('pro_id')->on('pro_procesos');

            // Agregar índices
            $table->index('doc_id_tipo');
            $table->index('doc_id_proceso');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_documentos');
    }
};