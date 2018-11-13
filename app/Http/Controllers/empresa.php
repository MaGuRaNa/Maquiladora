<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\empresas;


class empresa extends Controller
{
    public function altaempresa()
    {
    	//ORM ELOQUENT
		//Select * From carreras -> //$carreras=carreras::all();
		//empresa
    	$clavequesigue = empresas::orderBy('Id_empresa','desc')
    	                          ->take(1)
								  ->get();
								  $enm = empresas::find(1);
								  if(!$enm){
									  $empresa=1;
								  }
								  if(!$enm!=1){
									$empresa = $clavequesigue[0]->Id_empresa+1;
								}

	
    	
        //return $carreras; //para ver si funciona la seleccion de campos 
		return view ("sistema_vistas.altaempresass")
		->with('Id_empresa',$empresa); //para mandar la información
	}
	public function guardarempr(Request $request)
    {
        $Nomb_emp = $request->Nomb_emp;
		$Id_empresa = $request->Id_empresa;
//		$Ubicacion= $request->Ubicacion;
        $Call= $request->Calle;
        $Col= $request->Col;
        $Loc= $request->loc;
        $Nui= $request->nui;
        $Nue= $request->nue;
		$CP= $request->CP;
		$Telefono= $request->Telefono;

		//NUNCA SE RECIBEN LOS ARCHIVOS(img,doc,etc.) PERO SE VALIDA :D
		//VALIDACION
		 $this->validate($request,[
            'Id_empresa'=>'required|numeric',
			'Nomb_emp'=>'required',
			'Calle'=>'required|regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú,0-9]*$/',
             'Col'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
             'loc'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
            'nui'=>'required|integer', 
            'nue'=>'required|integer', 
			'CP'=>'required|regex:/^[0-9]{5}$/',
			'Telefono'=>'required|regex:/^[0-9]{10}$/',
			]);
			
		//Cargar datos a la base
        
        
		$empre = new empresas;
		$empre->Id_empresa = $request->Id_empresa;  //Izquierda campos de la tabla derechos campos de la vista
		$empre->Nomb_emp = $request->Nomb_emp;
     	$empre->Calle_emp=$request->Calle;
        $empre->Colonia_emp=$request->Col;
        $empre->Local_emp=$request->loc;
        $empre->Numint_emp=$request->nui;
        $empre->Numext_emp=$request->nue;
    	$empre->CP=$request->CP;
		$empre->Telefono=$request->Telefono;	

		$empre-> save();

		$proceso ="ALTA REALIZADA";
		$mensaje ="Registro guardado correctamente";
		return view('sistema_vistas.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}	
	public function reportemp(){
		$empresas = empresas::orderBy('Nomb_emp','asc')->get();
		return view ('sistema_vistas.reportempss')
		->with('empresas',$empresas);
}
}
