<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\empresas;

use App\encargado_maquiladoras;


 
class encargado extends Controller
{
     public function altaencargado()
    {
    	//ORM ELOQUENT
    	//Select * From carreras -> //$carreras=carreras::all();
    	$empresas=empresas::withTrashed()->orderBy('Nomb_emp','Asc')
                                  ->get();
        
		$clavequesigue =encargado_maquiladoras::orderBy('Id_em','desc')
    	                          ->take(1)
    	                          ->get();
								  $enm = encargado_maquiladoras::find(1);
								  if(!$enm){
									  $em=1;
								  }
								  if(!$enm!=1){
									$em = $clavequesigue[0]->Id_em+1;
								}
	 										   
	
	
    	
        //return $carreras; //para ver si funciona la seleccion de campos 
		return view ("sistema_vistas.altaencargadoss")
        ->with('empresas',$empresas) //para mandar la información
		->with('Id_em', $em); //punto y coma va al ultimo ->with

    }
	public function guardaenc(Request $request)
    {
		$Usuario = $request->Usuario;
		$Contrasena= $request->Contrasena;
		$Nom_enc= $request->Nom_enc;
		$Ap_penc= $request->Ap_penc;
        $Ap_menc= $request->Ap_menc;
        $RFC_enc= $request->RFC_enc;



		//NUNCA SE RECIBEN LOS ARCHIVOS(img,doc,etc.) PERO SE VALIDA :D
		//VALIDACION
		 $this->validate($request,[
            'Nom_enc'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
            'Usuario'=>'required',
			'Contrasena'=>'required',
			'Ap_penc'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
			'Ap_menc'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
            'RFC_enc'=>'required|regex:/^[A-Z]{4}[0-9]{6}[0-9,A-Z]{3}$/',

//            'RFC_enc'=>'required|regex:/^[A-Z]{4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{4})$/'],
            'Imagen_enc' =>'image|mimes:jpg,png,gif,jpeg'

            ]);
            
			$file = $request->file('Imagen_enc');
		if($file!=""){
		$ldate = date('Ymd_His_');
		$img = $file->getClientOriginalName();
		$img2= $ldate.$img; //concatena nombre del archivo 
	\Storage::disk('local')->put($img2, \File::get($file)); //hace la transferencia
}
else{
	$img2= 'noavatar.jpg';
}


		//Cargar datos a la base
		$enc = new encargado_maquiladoras;
		$enc ->Usuario = $request->Usuario;  //Izquierda campos de la tabla derechos campos de la vista
		$user_pass = $request->Contrasena;
		$salt = md5($user_pass);
		$password_encriptado = crypt($user_pass, $salt);
		$enc ->Contrasena = $password_encriptado;
        $enc ->Nom_enc = $request->Nom_enc;
     	$enc ->Ap_penc =$request->Ap_penc;
    	$enc ->Ap_menc=$request->Ap_menc;
		$enc ->RFC_enc =$request->RFC_enc;
		$enc ->Id_empresa=$request->Id_empresa;
        
        $enc ->Imagen_enc = $img2;

		
		

		$enc-> save();

	$proceso ="ALTA REALIZADA";
		$mensaje ="Registro guardado correctamente";
		return view('sistema_vistas.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}	
	public function reportenc(){
		$enc = encargado_maquiladoras::withTrashed()->orderBy('Nom_enc','asc')->get();
		return view ('sistema_vistas.reportencs')
		->with('encargado_maquiladoras',$enc);

	}
	//METODO DE ELIMINACIÓN lOGICA
public function destroy_l($id){
	
	encargado_maquiladoras::find($id)->delete();
	
	return Redirect()->route('repemq');
	
}


//METODO DE ELIMINACIÓN FISICA DE LA BASE DE DATOS 
public function destroy_f($id)
{
	encargado_maquiladoras::withTrashed()->where('Id_em',$id)->forceDelete();
	return Redirect()->route('repemq');

}

public function restore($id)
    {
        encargado_maquiladoras::onlyTrashed()->where('Id_em',$id)->restore();
           
		return Redirect()->route('repemq');
    }
    public function modificame($id)
	{
		$encargados = encargado_maquiladoras::where('Id_em',$id)->get();
		$Idem = $encargados[0]->Id_em;
        $empresa = empresas::where('Id_empresa','=',$Idem)->get();
        $otrasempresas = empresas::where('Id_empresa','!=',$Idem)->get();
  
		return view('sistema_vistas.modificaencargadoss')
	                ->with('encargados',$encargados[0])
	                ->with('Idem',$Idem)
                    ->with('empresa',$empresa[0]->Nomb_emp)
                    ->with('otrasempresas',$otrasempresas);

	                
	}
	public function editae(Request $request)
    {
       $Usuario = $request->Usuario;
		$Contrasena= $request->Contrasena;
		$Nom_enc= $request->Nom_enc;
		$Ap_penc= $request->Ap_penc;
        $Ap_menc= $request->Ap_menc;
        $RFC_enc= $request->RFC_enc;



		//NUNCA SE RECIBEN LOS ARCHIVOS(img,doc,etc.) PERO SE VALIDA :D
		//VALIDACION
		 $this->validate($request,[
            'Nom_enc'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
            'Usuario'=>'required',
			'Contrasena'=>'required',
			'Ap_penc'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
			'Ap_menc'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
            'RFC_enc'=>'required|regex:/^[A-Z]{4}[0-9]{6}[0-9,A-Z]{3}$/',

//            'RFC_enc'=>'required|regex:/^[A-Z]{4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{4})$/'],
            'Imagen_enc' =>'image|mimes:jpg,png,gif,jpeg'

            ]);
            
			$file = $request->file('Imagen_enc');
		if($file!=""){
		$ldate = date('Ymd_His_');
		$img = $file->getClientOriginalName();
		$img2= $ldate.$img; //concatena nombre del archivo 
	\Storage::disk('local')->put($img2, \File::get($file)); //hace la transferencia
}
else{
	$img2= 'noavatar.jpg';
}


		//Cargar datos a la base
		$enc =encargado_maquiladoras::find($Id_em);
		$enc ->Usuario = $request->Usuario;  //Izquierda campos de la tabla derechos campos de la vista
		$user_pass = $request->Contrasena;
		$salt = md5($user_pass);
		$password_encriptado = crypt($user_pass, $salt);
		$enc ->Contrasena = $password_encriptado;
        $enc ->Nom_enc = $request->Nom_enc;
     	$enc ->Ap_penc =$request->Ap_penc;
    	$enc ->Ap_menc=$request->Ap_menc;
		$enc ->RFC_enc =$request->RFC_enc;
		$enc ->Id_empresa=$request->Id_empresa;
        
        $enc ->Imagen_enc = $img2;	

		$enc-> save();

		$proceso ="MODIFICACION REALIZADA";
		$mensaje ="Registro guardado correctamente";
		return view('sistema_vistas.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);

	}	


}	
    
