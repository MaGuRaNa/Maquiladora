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
            $table->string('Calle_emp');
			$table->string('Colonia_emp');
			$table->string('Local_emp');
			$table->string('Numint_emp');
			$table->string('Numext_emp');
            $table->integer('CP');
            $table->bigInteger('Telefono');
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
        Schema::drop('Empresas');
    }
}
