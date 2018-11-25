<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfazeresListaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afazeres_lista', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lista')->unsigned();
            $table->foreign('id_lista')->references('id')->on('listas')->onDelete('cascade');
            $table->string('acao', 255);
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
        Schema::dropIfExists('afazeres_lista');
    }
}
