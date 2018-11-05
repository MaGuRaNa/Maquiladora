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
		  $clavesiguiente=materia_primas::orderBy('Id_mat','desc')
								->take(1)
								->get();
        
          $matprimas = materia_primas::find(1);
        if(!$matprimas){
            $matid=1;
        }
        if(!$matprimas!=1){
           $matid=$clavesiguiente[0]->Id_mat+1; //Ingresa clave automatica en el campo de id
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
		return redirect('/altamateria');//Redireccion a la ruta
	}		
	
	public function reportemateria()
	{
    
	$materia_primas = materia_primas::orderBy('Id_mat','asc')->get();
        
	return view ('sistema_vistas.reportemateria')
	->with('materia_primas',$materia_primas);
	
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
