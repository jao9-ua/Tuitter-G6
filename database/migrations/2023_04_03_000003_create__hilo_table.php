<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creamos la tabla Hilo
        if (!Schema::hasTable('Hilo')) {
            Schema::create('Hilo', function (Blueprint $table) {
                $table->id();
                $table->text('texto');
                $table->string('imagen')->nullable();
                $table->date('fecha')->default(now());
                $table->unsignedBigInteger('categoria_id')->nullable();
                $table->foreign('categoria_id')->references('id')->on('Categoria')->onDelete('set null');
                $table->unsignedBigInteger('usuario_id')->nullable();
                $table->foreign('usuario_id')->references('id')->on('Usuario')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Hilo');
    }
};
