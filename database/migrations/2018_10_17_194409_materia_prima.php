<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MateriaPrima extends Migration
{

    public function up()
    {
        Schema::create('Materia_primas', function (Blueprint $table){
       $table->increments('Id_mat');
       $table->string('Nom_mat');
       $table->string('Descripcion');
       $table->integer('Cantidad');
       $table->float('Peso',4,2);
       $table->date('Fecha');
	   $table->boolean('Activo_mat');
       $table->integer('Id_pig')->unsigned(); //Llave foranea Orden Produccion
       $table->foreign('Id_pig')->references('Id_pig')->on('Pigmentos');
       $table->rememberToken();
		    $table->timestamps();
       
        });
    }

 
    public function down()
    {
        Schema::drop('Materia_primas');
    }
}
