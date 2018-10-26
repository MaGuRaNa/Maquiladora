<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdenProductoFinal extends Migration
{

    public function up()
    {
        Schema::create('Orden_productos_finales', function (Blueprint $table) {
            $table->increments('Id_opf');
			$table->string('Imagen_pro');
		    $table->integer('Id_resp')->unsigned();
			$table->integer('Id_em')->unsigned();
			$table->date('Fecha_salida');  
		    $table->foreign('Id_resp')->references('Id_resp')->on('Responsables');
            $table->foreign('Id_em')->references('Id_em')->on('Encargado_maquiladoras');		
			$table->rememberToken();
		    $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::drop('Orden_productos_finales'); 
    }
}
