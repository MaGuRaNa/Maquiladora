<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pigmentos extends Migration
{
    
    public function up()
    {
       Schema::create('Pigmentos', function(Blueprint $table){
      $table->increments('Id_pig');
      $table->string('Clave');
      $table->string('Color');
	  $table->boolean('Activo_pig');
      $table->rememberToken();
      $table->timestamps(); 
           });
    }

    
    public function down()
    {
        Schema::drop('Pigmentos');
    }
}
