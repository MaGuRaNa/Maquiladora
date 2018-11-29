@extends('sistema_vistas.indextablas')
@section('Encabezado')
Materias primas
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
                     <a href="{{URL::to('/operacionmateria')}}"  style="color:hsla(0,100%,50%,0.5);">Historial de eliminaciones</a>
                    <!--                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
                    <div class="table-responsive m-t-40">
                        <table id="example233" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <th>Peso</th>
                                    <th>Fecha</th>
                                    <!--<th>Activo</th>-->
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($materia_primas as $mat)
                                <tr>
                                    <td>{{$mat->Id_mat}}</td>
                                    <td>{{$mat->Nom_mat}}</td>
                                    <td>{{$mat->Descripcion}}</td>
                                    <td>{{$mat->Cantidad}}</td>
                                    <td>{{$mat->Peso}}</td>
                                    <td>{{ \Carbon\Carbon::parse($mat->Fecha)->formatLocalized('%d de %B de %Y')}} </td>
                                    <!--<td>{{$mat->Activo_mat}}</td>-->
                                    <td>
                                        <a href="{{URL::action('matprima@modificamateria',['Id_mat'=>$mat->Id_mat])}}">
                                           <i class="fas fa-edit"> Editar</i>
                                        </a>
                                    
                                        <a href="{{URL::action('matprima@eliminamateria',['Id_mat'=>$mat->Id_mat])}}">
                                             <i class="fas fa-trash"> Borrar</i>
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
