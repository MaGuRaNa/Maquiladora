<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\empresa;

use App\responsable;

class responsable extends Controller
{
     public function altaresponsable()
    {
    	//ORM ELOQUENT
    	//Select * From carreras -> //$carreras=carreras::all();
    	
    	$clavequesigue = responsables::orderBy('Id_resp','desc')
    	                          ->take(1)
    	                          ->get();

    	  $resp = $clavequesigue[0]->Id_resp+1;
	
    	
        //return $carreras; //para ver si funciona la seleccion de campos 
		return view ("sistema_vistas.altaresponsable")
		->with('resp', $resp); //punto y coma va al ultimo ->with
	}
}	
    
