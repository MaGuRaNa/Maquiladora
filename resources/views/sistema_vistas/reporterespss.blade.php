@extends('sistema_vistas.index')
@section('Encabezado')
Responsables
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
                        <table id="respo" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>RFC</th>
                                    <th>Activo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($responsables as $re)
                                <tr>
                                    <td>{{$re->Id_resp}}</td>
                                    <td>{{$re->Nombre_resp}}</td>
                                    <td>{{$re->Ap_presp}}</td>
                                    <td>{{$re->Ap_mresp}}</td>
                                    <td>{{$re->RFC_resp}}</td>
                                    <td>{{$re->Activo_resp}}</td>
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
