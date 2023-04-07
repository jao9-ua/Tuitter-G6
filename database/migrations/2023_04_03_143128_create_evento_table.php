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
        if (!Schema::hasTable('Evento')) {
            Schema::create('Evento', function (Blueprint $table) {
                $table->id();
                $table->text('texto');
                $table->string('imagen')->nullable();
                $table->date('fecha_ini')->default(now());
                $table->date('fecha_post')->default(now());
                $table->date('fecha_fin')->default(now());
                $table->unsignedBigInteger('categoria_id')->nullable();
                $table->unsignedBigInteger('usuario_id')->nullable();
                $table->foreign('categoria_id')->references('id')->on('Categoria')->onDelete('set null');
                $table->foreign('usuario_id')->references('id')->on('Usuario')->onDelete('set null');
                $table->timestamps();
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
        Schema::dropIfExists('Evento');
    }
};
