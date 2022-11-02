<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('restrict');
            $table->string('usuario',30)->unique();
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('email', 50)->unique()->nullable();
            $table->string('password', 100);
            $table->string('foto',15)->nullable();
            $table->enum('estado',['0','1','2'])->default('1');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}