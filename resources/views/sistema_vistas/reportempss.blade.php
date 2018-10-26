@extends('sistema_vistas.index')
@section('Encabezado')
Responsables
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
            <table id="Empresa" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th>Clave</th><th>Nombre</th><th>Ubicacion</th><th>Telefono</th><th>Activo</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            @foreach($empresas as $em)
<tr><td>{{$em->Id_empresa}}</td><td>{{$em->Nomb_emp}}</td><td>{{$em->Ubicacion}}</td>
<td>{{$em->Telefono}}</td><td>{{$em->Activo_empr}}</td></tr>
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
