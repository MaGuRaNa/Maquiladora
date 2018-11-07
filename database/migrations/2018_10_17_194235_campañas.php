<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Campañas extends Migration
{
   
    public function up()
    {
       Schema::create('Campañas', function(Blueprint $table){
     $table->increments('Id_campana');
     $table->string('Nombre_campaña');
     $table->integer('Numero');
     $table->date('Fecha');
	 $table->timestamp('deleted_at');
     $table->rememberToken();
    $table->timestamps();
    	});
    }

    
    public function down()
    {
        schema::drop('Campañas');
    }
}
