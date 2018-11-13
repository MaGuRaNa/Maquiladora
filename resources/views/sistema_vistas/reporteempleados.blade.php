@extends('sistema_vistas.index')
@section('Encabezado')
Empleados
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
                        <table id="emple" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Apellido paterno</th>
                                    <th>Apellido materno</th>
                                    <th>RFC</th>
                                    <th>Telefono</th>
                                    <th>Calle</th>
                                    <th>Colonia</th>
                                    <th>Localidad</th>
                                    <th>No. int</th>
                                    <th>No. ext</th>
                                    <th>Modificar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empleados as $em)
                                <tr>
                                    <td>{{$em->Id_emp}}</td>
                                    <td>{{$em->NombreE}}</td>
                                    <td>{{$em->Ap_pat}}</td>
                                    <td>{{$em->Ap_mat}}</td>
                                    <td>{{$em->RFC}}</td>
                                    <td>{{$em->Telefono}}</td>
                                    <td>{{$em->Calle_emple}}</td>
                                    <td>{{$em->Colonia_emple}}</td>
                                    <td>{{$em->Local_emple}}</td>
                                    <td>{{$em->Numint_emple}}</td>
                                    <td>{{$em->Numext_emple}}</td>

                                    <td>
                                        <a href="{{URL::action('empleado@modificaempleado',['Id_emp'=>$em->Id_emp])}}">
                                            Icono M.
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            Icono E.
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
