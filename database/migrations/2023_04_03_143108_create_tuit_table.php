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
        // Creamos la tabla Tuit
        if (!Schema::hasTable('Tuit')) {
            Schema::create('Tuit', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('hilo_id');
                $table->foreign('hilo_id')->references('id')->on('Hilo')->onDelete('cascade');
                $table->text('texto');
                $table->string('imagen')->nullable();
                $table->date('fecha');
                $table->integer('orden');
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
        Schema::dropIfExists('tuit');
    }
};
