<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->unsignedBigInteger('id_direccion');
            $table->date('fecha');
            $table->string('estado');
            $table->string('ubicacion');
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();

            $table->foreign('id_direccion')->references('id')->on('direcciones')->onDelete('cascade');

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}
