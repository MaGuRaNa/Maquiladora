<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleOrdenProduccion extends Migration
{

    public function up()
    {
        Schema::create('Detalle_ordenprods', function (Blueprint $table){
                    $table->increments('Id_DOP');
                    $table->integer('Cantidad');
                    $table->float('Peso',4,2);
                    $table->integer('Id_mat')->unsigned(); //Llave foranea materia prima
                    $table->foreign('Id_mat')->references('Id_mat')->on('Materia_primas');
                    $table->integer('Id_OP')->unsigned(); //Llave foranea Orden Produccion
                    $table->foreign('Id_OP')->references('Id_OP')->on('Orden_producciones');
                  /*  $table->integer('Id_pig')->unsigned(); //Llave foranea Pigmentos
                    $table->foreign('Id_pig')->references('Id_pig')->on('Pigmentos'); porque no sabemos que onda xD*/
                                        
                    $table->rememberToken();
                    $table->timestamps();
    });
    }

 
    public function down()
    {
        Schema::drop('Detalle_ordenprods');
    }
}
