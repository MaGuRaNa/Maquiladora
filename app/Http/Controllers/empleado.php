<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\empleados;

class empleado extends Controller
{
    public function altaempleado()
    {
//empleado
        $clavesiguiente = empleados::orderBy('Id_emp','desc')
								->take(1)
								->get();
        
        $empleado = empleados::find(1);
        if(!$empleado){
            $emplid=1;
        }
        if(!$empleado!=1){
           $emplid = $clavesiguiente[0]->Id_emp+1; //Ingresa clave automatica en el campo de id
        }
        
	   return view ("sistema_vistas.altaempleado")
	   ->with('emplid',$emplid); //Se carga los datos de la variable $emplid
	}	
    public function guardaempleado(Request $request)
    {
        $Id_emp = $request->idempl;
		$NombreE = $request->nomempl;
		$Ap_pat= $request->appempl;
		$Ap_mat = $request->apmempl;
		$RFC= $request->rfcempl;
		$Telefono = $request->telempl;
        $Call= $request->Calle;
        $Col= $request->Col;
        $Loc= $request->loc;
        $Nui= $request->nui;
        $Nue= $request->nue;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[

		 'nomempl'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
         'appempl'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
         'apmempl'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
         'rfcempl'=>'required|regex:/^[A-Z]{4}[0-9]{6}[0-9,A-Z]{3}$/',
//		 'rfcempl'=>['regex:/^[A-Z]{4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{4})$/'],
		 'telempl'=>'required|numeric|regex:/^[0-9]{10}+$/',
		 'Calle'=>'required|regex:/^[A-Z,a-z, ,ñ,é,í,á,ó,ú,0-9]*$/',
             'Col'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
             'loc'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
            'nui'=>'required|integer', 
            'nue'=>'required|integer',
	     ]);
        
             $Direccion = $Call.", ".$Col.", ".$Loc.", No. int. ".$Nui.", No. ext. ".$Nue;
		 //Iniciamos el modelo empleado
		    $emple = new empleados;
			$emple->Id_emp = $request->idempl;
			$emple->NombreE = $request->nomempl;
			$emple->Ap_pat =$request->appempl;
			$emple->Ap_mat= $request->apmempl;
			$emple->RFC=$request->rfcempl;
			$emple->Telefono=$request->telempl;
			$emple->Calle_emple=$request->Calle;
            $emple->Colonia_emple=$request->Col;
            $emple->Local_emple=$request->loc;
            $emple->Numint_emple=$request->nui;
            $emple->Numext_emple=$request->nue;
            $emple->save();
		//$proceso = "Empleado";	
	   // $mensaje="Registro guardado correctamente";
		return redirect('/altaempleado');
		//->with('proceso',$proceso)
		
	}		
	
	public function reporteempleado()
	{
	$empleados = empleados::orderBy('NombreE','asc')->get();
	return view ('sistema_vistas.reporteempleados')
	->with('empleados',$empleados);
	
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
