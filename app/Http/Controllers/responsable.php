<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\empresas;

use App\responsables;



class responsable extends Controller
{
     public function altaresponsable()
    {
//responsable    	//ORM ELOQUENT
    	//Select * From carreras -> //$carreras=carreras::all();
    	$empresas=empresas::where('Activo_empr','=','1')
    	                          ->orderBy('Nomb_emp','Asc')
    	                          ->get();
    	$clavequesigue = responsables::orderBy('Id_resp','desc')
    	                          ->take(1)
								  ->get();
								  $enm = responsables::find(1);
								  if(!$enm){    
									  $resp=1;
								  }
								  if(!$enm!=1){
									$resp = $clavequesigue[0]->Id_resp+1;
								}

	
    	
        //return $carreras; //para ver si funciona la seleccion de campos 
		return view ("sistema_vistas.altaresponsabless")
		->with('empresas',$empresas) //para mandar la información
		->with('Id_resp', $resp); //punto y coma va al ultimo ->with
	}
	public function guardaresp(Request $request)
    {
		$Nombre_resp = $request->Nombre_resp;
		$Id_resp = $request->Id_resp;
		$app= $request->app;
		$apm= $request->apm;
		$rfc= $request->rfc;

		//NUNCA SE RECIBEN LOS ARCHIVOS(img,doc,etc.) PERO SE VALIDA :D
		//VALIDACION
		 $this->validate($request,[
			'Id_resp'=>'required|numeric',
			'Nombre_resp'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
			'app'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
			'apm'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
			'rfc'=>'required|regex:/^[A-Z]{4}[0-9]{6}[0-9,A-Z]{3}$/',
			]);
			
		//Cargar datos a la base
		$empr = new responsables;
		$empr ->Id_resp = $request->Id_resp;  //Izquierda campos de la tabla derechos campos de la vista
		$empr ->Nombre_resp = $request->Nombre_resp;
     	$empr ->Ap_presp =$request->app;
    	$empr ->Ap_mresp=$request->apm;
		$empr ->RFC_resp =$request->rfc;
		$empr ->Id_empresa=$request->idempr;
		
		
		

		$empr-> save();

		$proceso ="ALTA DE RESPONSABLES";
		$mensaje ="Registro guardado correctamente";
		return view('sistema_vistas.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}

	public function reporteresps(){
		$responsables = responsables::orderBy('Nombre_resp','asc')->get();
		return view ('sistema_vistas.reporterespss')
		->with('responsables',$responsables);

	}
		
}	
    
