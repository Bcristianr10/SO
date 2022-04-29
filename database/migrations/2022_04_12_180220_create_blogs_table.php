<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_1');
            $table->string('titulo_2');
            $table->string('titulo_3');
            $table->text('resena');
            $table->text('comentario');
            $table->text('texto_1');
            $table->text('texto_2');
            $table->text('texto_3');
            $table->string('escritor');
            $table->string('programa');
            $table->date('fecha');
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
        Schema::dropIfExists('blog');
    }
}
