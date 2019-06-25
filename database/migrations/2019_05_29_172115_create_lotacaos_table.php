<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotacaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('sigla');
            $table->string('superintendencia');
            $table->timestamps();
        });

        Schema::create('lotacao_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lotacao_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('lotacao_id')
            ->references('id')
            ->on('lotacaos')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

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
        Schema::dropIfExists('lotacao_user');
        Schema::dropIfExists('lotacaos');
    }
}
