<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbAnuncios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->float('preco', 8,2);
            $table->json('images');
            $table->integer('cod_cliente')->nullable();
            $table->foreign('cod_cliente')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_anuncios');
    }
}
