<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncargadoMaquiladora extends Migration
{
    
    public function up()
    {
       Schema::create('Encargado_maquiladoras', function (Blueprint $table) {
            $table->increments('Id_em');
			$table->string('Usuario');
			$table->string('Contrasena');
		    $table->string('Nom_enc');
			$table->string('Ap_penc');
			$table->string('Ap_menc');
			$table->string('RFC_enc');
			$table->string('Imagen_enc');
            $table->integer('Id_empresa')->unsigned();
		    $table->foreign('Id_empresa')->references('Id_empresa')->on('Empresas');
			$table->timestamp('deleted_at'); 		
			$table->rememberToken();
		    $table->timestamps();
        });
    }

 
    public function down()
    {
         Schema::drop('Encargado_maquiladoras');
    }
}
