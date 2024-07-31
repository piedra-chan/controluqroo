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
        Schema::create('usuarios_acceso', function (Blueprint $table) {
            $table->increments('usuarios_acceso_id');
            $table->integer('solicitud_acceso_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->foreign('solicitud_acceso_id')->references('solicitud_acceso_id')->on('solicitudes_acceso')->onDelete('cascade');
            $table->foreign('usuario_id')->references('usuario_id')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_acceso');
    }
};
