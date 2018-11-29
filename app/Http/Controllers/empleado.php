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
        $clavesiguiente = empleados::withTrashed()->orderBy('Id_emp','desc')
								->take(1)
								->get();
        
        if(count($clavesiguiente)==0)
			{
				$emplid = 1;
			}				
			else
			{
           $emplid = $clavesiguiente[0]->Id_emp+1;
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
		$proceso ="ALTA REALIZADA";
		$mensaje ="Registro guardado correctamente";
		return view('sistema_vistas.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
		//->with('proceso',$proceso)
		
	}		
	
	public function reporteempleado()
	{
	$empleados= empleados::orderBy('Id_emp','asc')->get();
		
	return view ('sistema_vistas.reporteempleados')
	->with('empleados',$empleados);
	
	}
	
	public function operacionempleado()
	{
		$empleados=\DB::select("SELECT *
        FROM empleados where deleted_At IS NOT NULL");
		
		/*$empleados=\DB::select("SELECT Id_emp,NombreE,Ap_pat,Ap_mat,RFC,Telefono,Calle_emple,Colonia_emple,Local_emple,Numint_emple,
		Numext_emple,deleted_at 
        FROM empleados where deleted_At IS NOT NULL");*/
		
	return view ('sistema_vistas.reporteoperacionemple')
	->with('empleados',$empleados);
	
	}
	
	public function eliminaempleado($Id_emp)
	{
		    $emple=empleados::find($Id_emp);
			$emple->delete();
		
			$proceso ="ELIMINACIÓN";
            $mensaje ="Registro eliminado correctamente";
            return view('sistema_vistas.mensaje')
            ->with('proceso',$proceso)
            ->with('mensaje',$mensaje);
	}
	public function modificaempleado($Id_emp)
	{
		$empleado = empleados::where('Id_emp','=',$Id_emp)->get();
  
		return view('sistema_vistas.modificaempleado')
	                ->with('empleado',$empleado[0]);
	}
    
    	public function editaempleado(Request $request) //Request porque recibe todo el formulario
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
        
            
           
		 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		    $emple = empleados::find($Id_emp);
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
            
            return redirect('/reporteempleado');
		
	}
	public function restauraempleado($Id_emp)
	{
		empleados::withTrashed()->where('Id_emp',$Id_emp)->restore();
		
		$proceso = "RESTAURACIÓN";	
	    $mensaje="Registro restaurado correctamente";
		return view('sistema_vistas.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);		
	}
	
	public function destroy_emple($Id_emp)
{
	empleados::withTrashed()->where('Id_emp',$Id_emp)->forceDelete();
	 return redirect('/reporteempleado');

}
}
