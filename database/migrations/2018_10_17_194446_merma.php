<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Merma extends Migration
{
    
    public function up()
    {
        Schema::create('Mermas', function(Blueprint $table){
         $table->increments('Id_merma');
         $table->integer('Id_mat')->unsigned(); //Llave foranea materia prima
         $table->foreign('Id_mat')->references('Id_mat')->on('Materia_primas');
         $table->integer('Cant_Devolucion');
         $table->string('Observacion');
         $table->date('Fecha');
            $table->rememberToken();
		    $table->timestamps();
    });
    }

  
    public function down()
    {
        Schema::drop('Mermas');
    }
}
