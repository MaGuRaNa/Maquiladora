@extends('sistema_vistas.index')
@section('Encabezado')
Encargado
@stop
@section('Clasificacion')
Formularios
@stop
@section('Contenido')
<div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Empresas</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <table id="Encargado maquiladora" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th>Clave</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>RFC</th><th>Imagen</th><th>Activo</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            @foreach($encargado_maquiladoras as $em)
<td>{{$em->Id_em}}</td><td>{{$em->Nom_enc}}</td><td>{{$em->Ap_penc}}</td>
<td>{{$em->Ap_menc}}</td><td>{{$em->RFC_enc}}</td><td><img src="{{asset('archivos/'.$em->Imagen_enc)}}" height="50" width="50"></td><td>{{$em->Activo_enc}}</td></tr>
@endforeach
                                            
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                </div>
                            </div>
                            <!--                            <input type='submit' value='Guardar'>-->
                            <br>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
</div>

@stop
