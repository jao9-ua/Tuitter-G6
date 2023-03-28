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
        
        // Creamos la tabla Categoria
        Schema::create('Categoria', function (Blueprint $table) {
            $table->id();
            $table->string('hashtag');
            $table->integer('views');
            $table->string('imagen')->nullable();
        });
         // Creamos la tabla Hilo
         Schema::create('Hilo', function (Blueprint $table) {
            $table->id();
            $table->text('texto');
            $table->string('imagen')->nullable();
            $table->date('fecha')->default(now());
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');
        });


        // Creamos la tabla Tuit
        Schema::create('Tuit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hilo_id');
            $table->foreign('hilo_id')->references('id')->on('hilos')->onDelete('cascade');
            $table->text('texto');
            $table->string('imagen')->nullable();
            $table->date('fecha');
            $table->integer('orden');
        });

        Schema::create('usuario_tuit', function (Blueprint $table) {
            $table->if();
            $table->date('Fecha')->default(now());
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('tuit_id');

            $table->foreign('usuario_id')->references('id')->on('Usuario');
            $table->foreign('tuit_id')->references('id')->on('Tuit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('hilo');
        Schema::dropIfExists('tuits');
        
    }
};
