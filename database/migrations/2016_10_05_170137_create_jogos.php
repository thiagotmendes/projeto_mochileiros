<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJogos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('jogos', function (Blueprint $table) {
        $table->increments('idjogos');
        $table->integer('idpais');
        $table->string('nome');
        $table->string('link');
        $table->longText('descricao');
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
      Schema::drop('jogos');
    }
}
