<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCendocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cendocentes', function (Blueprint $table) {
            $table->id();
            $table->string('denominacion',50)->nullable();;
            $table->string('cif',20)->nullable();;
            $table->string('dir_postal',100)->nullable();;
            $table->char('cp',5)->nullable();;
            $table->string('director_nom',20)->nullable();;
            $table->string('director_apellido1',20)->nullable();;
            $table->string('director_apellido2',20)->nullable();;
            $table->string('documento')->enum('dni', 'nie','pasaporte','sin espefificar')->nullable();;
            $table->string('titularidad')->enum('publica', 'concertado','privado','sin espefificar')->nullable();;
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
        Schema::dropIfExists('cendocentes');
    }
}
