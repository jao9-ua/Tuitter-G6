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

         Schema::create('hilos', function (Blueprint $table) {
            $table->id();
            $table->text('texto');
            $table->string('imagen')->nullable();
            $table->timestamp('fecha');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');
        });

        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('hashtag');
            $table->integer('views');
            $table->string('imagen')->nullable();
        });

        Schema::create('tuits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hilo_id');
            $table->foreign('hilo_id')->references('id')->on('hilos')->onDelete('cascade');
            $table->text('texto');
            $table->string('imagen')->nullable();
            $table->timestamp('fecha');
            $table->integer('orden');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hilo');
        Schema::dropIfExists('tuits');
        Schema::dropIfExists('categorias');
    }
};
