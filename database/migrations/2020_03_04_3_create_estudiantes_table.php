<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
           
            $table->increments('id_estudiante');
            $table->integer('fk_id_informacion')->unsigned();
            $table->string('matricula');
            $table->string('carrera');
            $table->string('nickname');

            $table->foreign('fk_id_informacion')->references('id_informacion')->on('informacions');
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
        Schema::dropIfExists('estudiantes');
    }
}
