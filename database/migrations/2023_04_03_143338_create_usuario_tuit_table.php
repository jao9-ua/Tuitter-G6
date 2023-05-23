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
        //like
        Schema::create('usuario_tuit', function (Blueprint $table) {
            $table->id();
            $table->date('Fecha')->default(now());
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('tuit_id');


            $table->foreign('tuit_id')->references('id')->on('Tuit')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('Usuario')->onDelete('cascade');
            $table->timestamps();
            // Agregar restricción de clave única
            $table->unique(['usuario_id', 'tuit_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_tuit');
    }
};
