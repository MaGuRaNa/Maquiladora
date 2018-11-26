@extends('sistema_vistas.indextablas')
@section('Encabezado')
Proveedores
@stop
@section('Clasificacion')
Consultas
@stop
@section('Contenido')

<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   
                    <h4 class="card-title">Tabla de registros</h4>
                     <a href="{{URL::to('/operacionempleado')}}">Historial de eliminaciones</a>
                    <!--                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Apellido paterno</th>
                                    <th>Apellido materno</th>
                                    <th>RFC</th>
                                    <th>Empresa</th>
                                    <!-- <th>Activo</th>-->
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                               @if(count($proveedores) > 0)
                                @foreach($proveedores as $pro)
                                <tr>
                                    <td>{{$pro->Id_prov}}</td>
                                    <td>{{$pro->NombreProv}}</td>
                                    <td>{{$pro->Ap_pprov}}</td>
                                    <td>{{$pro->Ap_mprov}}</td>
                                    <td>{{$pro->RFC_prov}}</td>
                                    <td>{{$pro->empre}}</td>
                                  
                                    <td>
                                        <a href="{{URL::action('proveedor@modificaproveedor',['Id_prov'=>$pro->Id_prov])}}">
                                           <i class="fas fa-edit"></i>
                                        </a>
                                   
                                        <a href="{{URL::action('proveedor@eliminaproveedor',['Id_prov'=>$pro->Id_prov])}}">
                                             <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
