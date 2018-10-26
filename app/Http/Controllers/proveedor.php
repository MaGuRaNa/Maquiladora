<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
/*use App\carreras;
use App\maestros;*/ // Ejemplos//
use App\proveedores;
use App\empresas;

class proveedor extends Controller
{
    public function altaproveedor()
    {
		// ORM ELOQUENT
		//select * from carreras
		//$carreras=carreras::all();
		//select * from carreras where activo = 'si' order by nombre asc
        /*$empresa=empresa::where('activo','=','Si')
		                    ->orderBy('nombre','Asc')
							->get();*/
          $empresas=empresas::all();
		  $clavesiguiente = proveedores::orderBy('Id_prov','desc')
								->take(1)
								->get();
        
          $proveedor = proveedores::find(1);
        if(!$proveedor){
            $provid=1;
        }
        if(!$proveedor!=1){
           $provid = $clavesiguiente[0]->Id_prov+1; //Ingresa clave automatica en el campo de id
        }
	 					
	    return view ("sistema_vistas.altaproveedor")
        ->with('empresas',$empresas)
	    ->with('provid',$provid); //Se carga los datos de la variable $emplid
	}	
    
    public function guardaproveedor(Request $request)
    {
		$Id_emp = $request->idprov;
		$NombreProv = $request->nomprov;
		$Ap_pprov= $request->appprov;
		$Ap_mprov = $request->apmprov;
		$RFC_prov= $request->rfcprov;
        
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'idprov'=>'required|numeric',
		 'nomprov'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
		 'appprov'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
		 'apmprov'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
		 'rfcprov'=>'required|regex:/^[A-Z]{4}[0-9]{6}[0-9,A-Z]{3}$/',
	     ]);
		 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		    $prov = new proveedores;
			$prov->Id_prov = $request->idprov;
			$prov->NombreProv = $request->nomprov;
			$prov->Ap_pprov =$request->appprov;
			$prov->Ap_mprov= $request->apmprov;
			$prov->RFC_prov=$request->rfcprov;
            $prov->Activo_prov=1;
			$prov->Id_empresa=$request->idempr;
			$prov->save();
		return redirect('/altaproveedor');//Redireccion a la ruta
	}		
	
	public function reporteproveedor()
	{
    
	$proveedores = proveedores::orderBy('Id_prov','asc')->get();
        
	return view ('sistema_vistas.reporteproveedores')
	->with('proveedores',$proveedores);
	
	}
	public function eliminam($idm)
	{
		    maestros::find($idm)->delete();
		    $proceso = "ELIMINAR MAESTROS";
			$mensaje = "El maestro ha sido borrado Correctamente";
			return view ('sistema.mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
	}
	public function modificam($idm)
	{
		$maestro = maestros::where('idm','=',$idm)->get();
        $idc = $maestro[0]->idc;
        $carrera = carreras::where('idc','=',$idc)->get();
        $demascarreras = carreras::where('idc','!=',$idc)->get();
		return view('sistema.guardamaestro')
	                ->with('maestro',$maestro[0])
                    ->with('idc',$idc)
                    ->with('carrera',$carrera[0]->nombre)
                    ->with('demascarreras',$demascarreras);
	}
    
    	public function editamaestro(Request $request) //Request porque recibe todo el formulario
	{
		$nombre = $request->nombre;
		$idm = $request->idm;
		$edad= $request->edad;
		$sexo = $request->sexo;
		$beca= $request->beca;
		$cp = $request->cp;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'idm'=>'required|numeric',
		 'nombre'=>'required',['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		 'edad'=>'required|integer|min:18|max:60',
		 'cp'=>'required',['regex:/^[0-9]{5}$/'],
		 'beca'=>'required',['regex:/^[0-9]+[.][0-9]{2}$/'],
		 'archivo'=>'image|mimes:jpg,jpeg,png,gif'
	     ]);
            
            $file = $request->file('archivo');
	 if($file!="")
	 {
	 $ldate = date('Ymd_His_');
	 $img = $file->getClientOriginalName();
	 $img2 = $ldate.$img;
	 \Storage::disk('local')->put($img2, \File::get($file));
	 }
		 
		 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		    $maest = maestros::find($idm);
			$maest->idm = $request->idm;
			$maest->nombre = $request->nombre;
			$maest->edad =$request->edad;
			$maest->sexo= $request->sexo;
			$maest->cp=$request->cp;
			$maest->beca=$request->beca;
			$maest->idc=$request->idc;
            if($file!=''){
                $maest->archivo=$img2;
            }
			$maest->save();
		$proceso = "MODIFICACIÓN DE MAESTRO";	
	    $mensaje="Registro modificado correctamente";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
}
