<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Request;
use App\pigmentos;

class pigmento extends Controller
{  
   protected function altaPigmento()
    {
        $clavesiguiente=pigmento::orderBy('Id_pig','Clave','Color')
        ->take(1)
        ->get();

$pigmento = pigmento::find(1);
if(!$pigmento){
$Idpig=1;
}
if(!$pigmento!=1){
$Idpig=$clavesiguiente[0]->Id_pig+1; //Ingresa clave automatica en el campo de id
}
        return view ("sistema_vistas.altaPigmento");
    }
    public function guardapigmento (Request $request)
    {
		
        $idpig = $request->idproceso;
        $clavepig = $request->clavepig;
		$color= $request->color;
    }

    $this->validate($request,[
'Idpig'=>'requered|numeric',
'Clave'=>'requered|numeric',
'Color'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,í,á,ó,ú]*$/',
    ]);
    public function muestraPigmento()
    {
     $pro =procesos::withTrashed()
     ->orderBy('Id')->paginate('1');
     return view('sistema.reporte',compact('pro')); 
    }
      
}
