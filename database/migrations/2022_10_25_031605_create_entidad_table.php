<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadTable extends Migration
{

    public function up()
    {
        Schema::create('entidad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',100)->unique();
            $table->string('direccion',60);
            $table->string('nit',15)->nullable()->unique();
            $table->string('telefono',10)->nullable()->unique();
            $table->string('contacto_1',10)->unique();
            $table->string('contacto_2',10)->nullable()->unique();
            $table->string('propietario',100)->nullable();
            $table->text('mision')->nullable();
            $table->text('vision')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('color',10);
            $table->string('foto',10)->nullable();
            $table->string('foto2',10)->nullable();
            $table->string('foto3',10)->nullable();
            $table->string('logo',10)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entidad');
    }
}
