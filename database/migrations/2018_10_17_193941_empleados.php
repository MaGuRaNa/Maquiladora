<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empleados extends Migration
{

    public function up()
    {
        Schema::create('Empleados', function(Blueprint $table){
         $table->increments('Id_emp');
         $table->string('NombreE');
         $table->string('Ap_pat');
         $table->string('Ap_mat');
         $table->string('RFC');
         $table->bigInteger('Telefono');
         $table->string('Direccion');
		 $table->boolean('Activo_empl');
         $table->rememberToken();
		 $table->timestamps();
    	});
    }

   
    public function down()
    {
       Schema::drop('Empleados');
    }
}
