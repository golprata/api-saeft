<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEfetividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('efetividades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_matricula');
            $table->integer('baixados');
            $table->integer('efetivos');
            $table->integer('ausentes');
            $table->integer('cancelados');
            $table->integer('log_irregular');
            $table->integer('mal_enderecado');
            $table->timestamps();

            $table->foreign('user_matricula')
            ->references('matricula')
            ->on('users')
            ->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('efetividades');
    }
}
