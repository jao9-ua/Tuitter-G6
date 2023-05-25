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
        if (!Schema::hasTable('categoria_usuario')) {
            Schema::create('categoria_usuario', function (Blueprint $table) {
                $table->id();
                $table->date('Fecha')->default(now());
                $table->unsignedBigInteger('usuario_id');
                $table->unsignedBigInteger('categoria_id');

                $table->foreign('categoria_id')->references('id')->on('Categoria')->onDelete('cascade');
                $table->foreign('usuario_id')->references('id')->on('Usuario')->onDelete('cascade');
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
        Schema::dropIfExists('categoria_id');
    }
};