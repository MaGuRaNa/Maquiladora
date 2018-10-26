<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleOrdenProductoFinal extends Migration
{
  
    public function up()
    {
        Schema::create('Detalle_orden_pfs', function (Blueprint $table) {
            $table->increments('Id_dopf');
		    $table->string('Nom_prodf');
			$table->integer('Cantidad');
			$table->integer('Id_opf')->unsigned();
			$table->integer('Factura');
		    $table->foreign('Id_opf')->references('Id_opf')->on('Orden_productos_finales');
					
			$table->rememberToken();
		    $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('Detalle_orden_pfs'); 
    }
}
