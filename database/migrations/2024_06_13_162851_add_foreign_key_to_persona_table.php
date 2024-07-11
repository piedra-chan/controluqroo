<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('persona', function (Blueprint $table) {
            $table->foreign('usuario_id')
                  ->references('usuario_id')
                  ->on('usuarios')
                  ->onDelete('cascade'); // Opcional: especifica el comportamiento ON DELETE
        });
    }
    
    public function down()
    {
        Schema::table('persona', function (Blueprint $table) {
            $table->dropForeign(['usuario_id']);
        });
    }
    
};
