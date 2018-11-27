<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\materia_primas;
use Carbon\Carbon;

class matprima extends Controller
{
    public function altamateria()
    {
		  
		$clavesiguiente = materia_primas::withTrashed()->orderBy('Id_mat','desc')
								->take(1)
								->get();
        
        if(count($clavesiguiente)==0)
			{
				$matid = 1;
			}				
			else
			{
           $matid = $clavesiguiente[0]->Id_mat+1;
			}
		
		
		
		
       // $ad= Carbon::now()->toDateString();
        setlocale(LC_TIME,'es');
        $date= Carbon::now();
        $date=$date->formatLocalized('%d de %B de %Y');
        
	    return view ("sistema_vistas.altamatprima")
	    ->with('matid',$matid)->with('date',$date); 
	}	
    
    public function guardamateria(Request $request)
    {
		$Id_mat = $request->idmat;
		$Nom_mat = $request->nommat;
		$Desc= $request->desc;
		$Cantidad = $request->cant;
		$Peso= $request->pes;
        
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'idmat'=>'required|numeric',
		 'nommat'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
		 'desc'=>'required|regex:/^[A-Z,0-9,a-z, ,ñ,é,í,á,ó,ú]*$/',
		 'cant'=>'required|numeric',
		 'pes'=>'required|regex:/^[0-9]+[.][0-9]{2}$/',
	     ]);
		 
        
        $ad= Carbon::now()->toDateString();
        
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		    $matp = new materia_primas;
			$matp->Id_mat = $request->idmat;
			$matp->Nom_mat = $request->nommat;
			$matp->Descripcion =$request->desc;
			$matp->Cantidad= $request->cant;
			$matp->Peso=$request->pes;
          
            $matp->Fecha=$ad;
			$matp->save();
		    $proceso ="ALTA REALIZADA";
	     	$mensaje ="Registro guardado correctamente";
	     	return view('sistema_vistas.mensaje')
	    	->with('proceso',$proceso)
		    ->with('mensaje',$mensaje);//Redireccion a la ruta
	}		
	
	public function reportemateria()
	{
    
	$materia_primas = materia_primas::orderBy('Id_mat','asc')->get();
	return view ('sistema_vistas.reportemateria')
	->with('materia_primas',$materia_primas);
	
	}
	
	public function operacionmateria()
	{
		$materia_primas=\DB::select("SELECT *
        FROM materia_primas where deleted_At IS NOT NULL");
		
		/*$empleados=\DB::select("SELECT Id_emp,NombreE,Ap_pat,Ap_mat,RFC,Telefono,Calle_emple,Colonia_emple,Local_emple,Numint_emple,
		Numext_emple,deleted_at 
        FROM empleados where deleted_At IS NOT NULL");*/
		
	return view ('sistema_vistas.reporteoperacionmateria')
	->with('materia_primas',$materia_primas);
	
	}
	
	public function eliminamateria($Id_mat)
	{
		    materia_primas::find($Id_mat)->delete();
		    $proceso = "ELIMINAR ";
			$mensaje = "El maestro ha sido borrado Correctamente";
			return view ('sistema_vistas.mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
	}
	public function modificamateria($Id_mat)
	{
		$materia = materia_primas::where('Id_mat','=',$Id_mat)->get();
		return view('sistema_vistas.modificamateriaprima')
                    ->with('materia',$materia[0]);
	}
    
    	public function editamateria(Request $request) //Request porque recibe todo el formulario
	{
		$Id_mat = $request->idmat;
		$Nom_mat = $request->nommat;
		$Desc= $request->desc;
		$Cantidad = $request->cant;
		$Peso= $request->pes;
        
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'idmat'=>'required|numeric',
		 'nommat'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
		 'desc'=>'required|regex:/^[A-Z,0-9,a-z, ,ñ,é,í,á,ó,ú]*$/',
		 'cant'=>'required|numeric',
		 'pes'=>'required|regex:/^[0-9]+[.][0-9]{2}$/',
	     ]);
		 
        
        $ad= Carbon::now()->toDateString();
        
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		    $matp = materia_primas::find($Id_mat);
			$matp->Id_mat = $request->idmat;
			$matp->Nom_mat = $request->nommat;
			$matp->Descripcion =$request->desc;
			$matp->Cantidad= $request->cant;
			$matp->Peso=$request->pes;
          
            $matp->Fecha=$ad;
			$matp->save();
		   return redirect('/reportemateria');
	}
	public function restauraempleado($Id_mat)
	{
		materia_primas::withTrashed()->where('Id_mat',$Id_mat)->restore();
		
		$proceso = "RESTAURACION";	
	    $mensaje="Registro restaurado correctamente";
		return view('sistema_vistas.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);		
	}
	public function destroy_mat($Id_mat)
{
	materia_primas::withTrashed()->where('Id_mat',$Id_mat)->forceDelete();
	 return redirect('/reportemateria');

}
	
}
