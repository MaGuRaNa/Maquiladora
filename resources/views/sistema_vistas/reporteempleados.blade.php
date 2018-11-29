@extends('sistema_vistas.indextablas')
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
                    <a href="{{URL::to('/operacionempleado')}}" style="color:hsla(0,100%,50%,0.5);">Historial de eliminaciones</a>
                    <div class="table-responsive m-t-40">
                       
                        <table id="example233" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
                                    <th>Operaciones</th>

                                </tr>
                            </thead>
                            <tbody>
                               @if(count($empleados) > 0)
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

                                        <center>
                                            
                                            <a href="{{URL::action('empleado@modificaempleado',['Id_emp'=>$em->Id_emp])}}">
                                                <i class="fas fa-edit"> Editar</i>
                                            </a>

                                            <a href="{{URL::action('empleado@eliminaempleado',['Id_emp'=>$em->Id_emp])}}">
                                                <i class="fas fa-trash"> Borrar</i>
                                            </a>
         
                                        </center>
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
