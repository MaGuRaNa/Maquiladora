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
    	$clavequesigue = empresas::orderBy('Id_empresa','desc')
    	                          ->take(1)
    	                          ->get();

    	$empresa = $clavequesigue[0]->Id_empresa+1;
	
    	
        //return $carreras; //para ver si funciona la seleccion de campos 
		return view ("sistema_vistas.altaempresa")
		->with('Id_empresa',$empresa); //para mandar la información
	}
	public function guardarempr(Request $request)
    {
        $Nomb_emp = $request->Nombre_resp;
		$Id_empresa = $request->Id_resp;
		$Ubicacion= $request->Ubicacion;
		$CP= $request->CP;
		$Telefono= $request->Telefono;

		//NUNCA SE RECIBEN LOS ARCHIVOS(img,doc,etc.) PERO SE VALIDA :D
		//VALIDACION
		 $this->validate($request,[
            'Id_empresa'=>'required|numeric',
			'Nomb_emp'=>'required',['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
			'Ubicacion'=>'required',['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
			'CP'=>'required',['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
			'Telefono'=>'required',['regex:/^[0-9]{10}+$/'],
			]);
			
		//Cargar datos a la base
		$empre = new empresas;
		$empre ->Id_empresa = $request->Id_empresa;  //Izquierda campos de la tabla derechos campos de la vista
		$empre ->Nomb_emp = $request->Nomb_emp;
     	$empre ->Ubicacion =$request->Ubicacion;
    	$empre ->CP=$request->CP;
		$empre ->Telefono =$request->Telefono;
		$empre ->Id_empresa=$request->Id_empresa;
		$empre ->Activo_empr = 1;
		
		

		$empre-> save();

		$proceso ="ALTA DE Empresa";
		$mensaje ="Registro guardado correctamente";
		return view('sistema_vistas.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}	
	public function reportemp(){
		$empresas = empresas::orderBy('Nomb_emp','asc')->get();
		return view ('sistema_vistas.reportemps')
		->with('empresas',$empresas);
}
}