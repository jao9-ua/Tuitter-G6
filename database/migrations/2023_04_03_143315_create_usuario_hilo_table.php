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
        if (!Schema::hasTable('usuario_hilo')) {
            Schema::create('usuario_hilo', function (Blueprint $table) {
                $table->id();
                $table->date('Fecha')->default(now());
                $table->unsignedBigInteger('usuario_id');
                $table->unsignedBigInteger('hilo_id');

                $table->foreign('usuario_id')->references('id')->on('Usuario')->onDelete('cascade');
                $table->foreign('hilo_id')->references('id')->on('Hilo')->onDelete('cascade');
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
        Schema::dropIfExists('usuario_hilo');
    }
};
