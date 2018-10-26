<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empresa extends Migration
{

    public function up()
    {
                
        Schema::create('Empresas',function(Blueprint $table){
            $table->increments('Id_empresa');
            $table->string('Nomb_emp');
            $table->string('Ubicacion');
            $table->integer('CP');
            $table->bigInteger('Telefono');
			$table->boolean('Activo_empr');
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
        Schema::drop('Empresas');
    }
}
