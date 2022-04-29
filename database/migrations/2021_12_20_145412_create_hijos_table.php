<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHijosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hijo', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email')->nullable();
            $table->date('fecha_nacimiento');
            $table->integer('pais_id');            
            $table->string('pasaporte');
            $table->string('sexo',1);
            $table->string('estado_migratorio');            
            $table->integer('corregimiento_id');
            $table->text('direccion');            
            $table->string('telefono',16);
            $table->string('nivel_academico');           
            $table->text('comentario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hijo');
    }
}
