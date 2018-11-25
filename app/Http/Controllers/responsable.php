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
    	$empresas=empresas::withTrashed()->orderBy('Nomb_emp','Asc')
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

		$proceso ="ALTA REALIZADA";
		$mensaje ="Registro guardado correctamente";
		return view('sistema_vistas.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}

	public function reporteresps(){
		$responsables = responsables::withTrashed()->orderBy('Nombre_resp','asc')->get();
		return view ('sistema_vistas.reporterespss')
		->with('responsables',$responsables);

	}
	//METODO DE ELIMINACIÓN lOGICA
public function destroy_l($id){
	
	responsables::find($id)->delete();
	
	return Redirect()->route('respp');
	
}


//METODO DE ELIMINACIÓN FISICA DE LA BASE DE DATOS 
public function destroy_f($id)
{
	responsables::withTrashed()->where('Id_resp',$id)->forceDelete();
	return Redirect()->route('respp');

}

public function restore($id)
    {
        responsables::onlyTrashed()->where('Id_resp',$id)->restore();
           
		return Redirect()->route('respp');
	}
	public function modificam($id)
	{
		$responsabless = responsables::where('Id_resp',$id)->get();
		$Idem = $responsabless[0]->Id_empresa;
        $empresa = empresas::where('Id_empresa','=',$Idem)->get();
        $otrasempresas = empresas::where('Id_empresa','!=',$Idem)->get();
  
		return view('sistema_vistas.modificaresp')
	                ->with('responsabless',$responsabless[0])
	                ->with('Idem',$Idem)
                    ->with('empresa',$empresa[0]->Nomb_emp)
                    ->with('otrasempresas',$otrasempresas);
	}
    
    	public function editaresp(Request $request) //Request porque recibe todo el formulario
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
		$empr = responsables::find($Id_resp);
		$empr ->Id_resp = $request->Id_resp;  //Izquierda campos de la tabla derechos campos de la vista
		$empr ->Nombre_resp = $request->Nombre_resp;
     	$empr ->Ap_presp =$request->app;
    	$empr ->Ap_mresp=$request->apm;
		$empr ->RFC_resp =$request->rfc;
		$empr ->Id_empresa=$request->idempr;
		
		
		

		$empr-> save();

		$proceso ="MODIFICACION REALIZADA";
		$mensaje ="Registro guardado correctamente";
		return view('sistema_vistas.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
		
	}
	
}
