<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proveedor extends Migration
{
    
    public function up()
    {
       Schema::create('Proveedores', function (Blueprint $table) {
            $table->increments('Id_prov');
           $table->string('NombreProv');
		    $table->string('Ap_pprov');
			$table->string('Ap_mprov');
			$table->string('RFC_prov');
            $table->integer('Id_empresa')->unsigned();
		    $table->foreign('Id_empresa')->references('Id_empresa')->on('Empresas');
			$table->timestamp('deleted_at'); 		
			$table->rememberToken();
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
         Schema::drop('Proveedores');
    }
}
