@extends('sistema_vistas.indextablas')
@section('Encabezado')
Empresas
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
                    <!--                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Ubicacion</th>
                                    <th>Telefono</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($empresas as $em)
                                <tr>
                                    <td>{{$em->Id_empresa}}</td>
                                    <td>{{$em->Nomb_emp}}</td>
                                    <td>{{$em->Ubicacion}}</td>
                                    <td>{{$em->Telefono}}</td>
                                        <td>
                                            @if($em->deleted_at!="")
                                            <a href="{{URL::action('empresa@destroy_f',['id'=>$em->Id_empresa])}}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar registro" >Eliminar Perm</i></a>
                                        <a href="{{URL::action('empresa@restore',['id'=>$em->Id_empresa])}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Restaurar registro" >Restaurar</a>
                                        @else
                                        <a href="{{URL::action('empresa@destroy_l',['id'=>$em->Id_empresa])}}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar registro" >Eliminarl</i></a>
                                     <a href="{{URL::action('empresa@modificamp',['id'=>$em->Id_empresa])}}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Modifica registro" >Modifica</i></a>

                                        
                                        @endif
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
