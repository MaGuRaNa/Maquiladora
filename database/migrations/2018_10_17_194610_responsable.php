<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Responsable extends Migration
{
  
    public function up()
    {
         Schema::create('Responsables', function (Blueprint $table) {
            $table->increments('Id_resp');
		    $table->string('Nombre_resp');
			$table->string('Ap_presp');
			$table->string('Ap_mresp');
			$table->string('RFC_resp');
            $table->integer('Id_empresa')->unsigned();
		    $table->foreign('Id_empresa')->references('Id_empresa')->on('Empresas');
			$table->timestamp('deleted_at');		
			$table->rememberToken();
		    $table->timestamps();
        });
    }

  
    public function down()
    {
Schema::drop('Responsables');     }
}
