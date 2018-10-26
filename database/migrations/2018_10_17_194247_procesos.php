<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Procesos extends Migration
{

    public function up()
    {
        Schema::create('Procesos', function(Blueprint $table){
       $table->increments('Id_proceso');
       $table->string('Nom_proceso');
	   $table->boolean('Activo_proc');
            $table->rememberToken();
		    $table->timestamps();
    	});
    }

  
    public function down()
    {
        Schema::drop('Procesos');
    }
}
