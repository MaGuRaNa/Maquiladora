<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
/*use App\carreras;
use App\maestros;*/ // Ejemplos//
use App\proveedores;
use App\empresas;
use Session;
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
		
		$clavesiguiente = proveedores::withTrashed()->orderBy('Id_prov','desc')
								->take(1)
								->get();
        
        if(count($clavesiguiente)==0)
			{
				$provid = 1;
			}				
			else
			{
           $provid = $clavesiguiente[0]->Id_prov+1;
			}
	 					
	    return view ("sistema_vistas.altaproveedor")
        ->with('empresas',$empresas)
	    ->with('provid',$provid); //Se carga los datos de la variable $emplid
	}	
    
    public function guardaproveedor(Request $request)
    {
		$Id_prov = $request->idprov;
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
			$prov->Id_empresa=$request->idempr;
			$prov->save();
		    $proceso ="ALTA REALIZADA";
            $mensaje ="Registro guardado correctamente";
            return view('sistema_vistas.mensaje')
            ->with('proceso',$proceso)
            ->with('mensaje',$mensaje);//Redireccion a la ruta
	}		
	
	public function reporteproveedor()
	{
    
	$proveedores=\DB::select("SELECT prov.Id_prov,prov.NombreProv,prov.Ap_pprov,prov.Ap_mprov,prov.RFC_prov,empr.Nomb_emp AS empre,prov.deleted_at
        FROM proveedores AS prov
        INNER JOIN empresas AS empr ON empr.Id_empresa =  prov.Id_empresa WHERE prov.deleted_at is NULL");
        
	return view ('sistema_vistas.reporteproveedores')
	->with('proveedores',$proveedores);
	
	}
	
	public function operacionproveedor()
	{
		$proveedores=\DB::select("SELECT prov.Id_prov,prov.NombreProv,prov.Ap_pprov,prov.Ap_mprov,prov.RFC_prov,empr.Nomb_emp AS empre,prov.deleted_at
        FROM proveedores AS prov
        INNER JOIN empresas AS empr ON empr.Id_empresa =  prov.Id_empresa where prov.deleted_at IS NOT NULL");
		
		/*$empleados=\DB::select("SELECT Id_emp,NombreE,Ap_pat,Ap_mat,RFC,Telefono,Calle_emple,Colonia_emple,Local_emple,Numint_emple,
		Numext_emple,deleted_at 
        FROM empleados where deleted_At IS NOT NULL");*/
		
	return view ('sistema_vistas.reporteoperacionprov')
	->with('proveedores',$proveedores);
	
	}
	
	public function eliminaproveedor($Id_prov)
	{
		    proveedores::find($Id_prov)->delete();
		    $proceso = "ELIMINACIÓN";
			$mensaje = "Registro eliminado correctamente";
			return view ('sistema_vistas.mensaje')
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
	}
	public function modificaproveedor($Id_prov)
	{
		$proveedor = proveedores::where('Id_prov','=',$Id_prov)->get();
        $Idem = $proveedor[0]->Id_empresa;
        $empresa = empresas::where('Id_empresa','=',$Idem)->get();
        $otrasempresas = empresas::where('Id_empresa','!=',$Idem)->get();
		return view('sistema_vistas.modificaproveedor')
	                ->with('proveedor',$proveedor[0])
                    ->with('Idem',$Idem)
                    ->with('empresa',$empresa[0]->Nomb_emp)
                    ->with('otrasempresas',$otrasempresas);
	}
    
    	public function editaproveedor(Request $request) //Request porque recibe todo el formulario
	{
		$Id_prov = $request->idprov;
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
		    $prov = proveedores::find($Id_prov);
			$prov->Id_prov = $request->idprov;
			$prov->NombreProv = $request->nomprov;
			$prov->Ap_pprov =$request->appprov;
			$prov->Ap_mprov= $request->apmprov;
			$prov->RFC_prov=$request->rfcprov;
			$prov->Id_empresa=$request->idempr;
			$prov->save();

            Session::flash('flash_message', 'REGISTRO EXITOSO');
            return redirect('/reporteproveedores');
	}
	
	public function restauraproveedor($Id_prov)
	{
		proveedores::withTrashed()->where('Id_prov',$Id_prov)->restore();
		
		$proceso = "RESTAURACION";	
	    $mensaje="Registro restaurado correctamente";
		return view('sistema_vistas.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);		
	}
	public function destroy_prov($Id_prov)
{
	proveedores::withTrashed()->where('Id_prov',$Id_prov)->forceDelete();
	 return redirect('/reporteproveedores');

}
}
