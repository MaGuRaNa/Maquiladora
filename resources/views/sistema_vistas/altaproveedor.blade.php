@extends('sistema_vistas.indexformularios')
@section('Encabezado')
Proveedor
@stop
@section('Clasificacion')
Formularios
@stop
@section('Contenido')
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">

                        <form action="{{route('guardaproveedor')}}" method='POST' enctype='multipart/form-data'>
                         
                            {{csrf_field()}}

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="idprov">ID PROVEEDOR<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="idprov" type='text' name='idprov' value="{{$provid}}" readonly='readonly'>
                                    @if($errors->first('idprov'))
                                    <i> {{ $errors->first('idprov') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nomprov">NOMBRE<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="nomprov" type='text' name='nomprov' value="{{old('nomprov')}}">
                                    @if($errors->first('nomprov'))
                                    <i> {{ $errors->first('nomprov') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="appprov">APELLIDO PATERNO<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="appprov" type='text' name='appprov' value="{{old('appprov')}}">
                                    @if($errors->first('appprov'))
                                    <i> {{ $errors->first('appprov') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="apmprov">APELLIDO MATERNO<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="apmprov" type='text' name='apmprov' value="{{old('apmprov')}}">
                                    @if($errors->first('apmprov'))
                                    <i> {{ $errors->first('apmprov') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="apmprov">RFC<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="apmprov" name='rfcprov' value="{{old('rfcprov')}}">
                                    @if($errors->first('rfcprov'))
                                    <i> {{ $errors->first('rfcprov') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="idempr">SELECCIONA UNAEMPRESA<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="idempr" name='idempr'>
                                        @foreach($empresas as $em)
                                        <option value='{{$em->Id_empresa}}'>{{$em->Nomb_emp}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
<!-- modificado select -->
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                                </div>
                            </div>

                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->

</div>
@stop
