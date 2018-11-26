@extends('sistema_vistas.indextablas')
@section('Encabezado')
Encargados
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
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>RFC</th>
                                    <th>Imagen</th>
                                   <th>Operaciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($encargado_maquiladoras as $em)
                                    <td>{{$em->Id_em}}</td>
                                    <td>{{$em->Nom_enc}}</td>
                                    <td>{{$em->Ap_penc}}</td>
                                    <td>{{$em->Ap_menc}}</td>
                                    <td>{{$em->RFC_enc}}</td>
                                    <td><img src="{{asset('archivos/'.$em->Imagen_enc)}}" height="50" width="50"></td>
                                    <td>
                                        <a href="">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            <i class="fas fa-trash"></i>
                                        </a>
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
