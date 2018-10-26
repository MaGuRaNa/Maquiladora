<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleOrdenAdquisicion extends Migration
{
   
    public function up()
    {
        Schema::create('Detalle_ordenadqs', function (Blueprint $table){
                    $table->increments('Id_DOA');
                    $table->integer('Id_OA')->unsigned();
                    $table->integer('Cantidad');
                    $table->float('Peso',4,2);
                    $table->string('Descripcion');
                    $table->integer('Id_mat')->unsigned(); //Llave foranea materia prima
                    $table->foreign('Id_mat')->references('Id_mat')->on('Materia_primas');
                    $table->foreign('Id_OA')->references('Id_OA')->on('Orden_adquisiciones');
                    $table->rememberToken();
                    $table->timestamps();
    });
    }

 
    public function down()
    {
        Schema::drop('Detalle_ordenadqs');
    }
}
