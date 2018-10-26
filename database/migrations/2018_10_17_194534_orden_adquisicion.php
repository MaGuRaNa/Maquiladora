<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdenAdquisicion extends Migration
{
    
    public function up()
    {
        Schema::create('Orden_adquisiciones', function (Blueprint $table) {
            $table->increments('Id_OA');
		    $table->integer('Id_prov')->unsigned();
			$table->integer('Id_em')->unsigned();
			$table->date('Fecha_ing');
			$table->string('Factura');
		    $table->foreign('Id_em')->references('Id_em')->on('Encargado_maquiladoras');
            $table->foreign('Id_prov')->references('Id_prov')->on('Proveedores');
					
			$table->rememberToken();
		    $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('Orden_adquisiciones'); 
    }
}
