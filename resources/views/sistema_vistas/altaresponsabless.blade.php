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
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">


                        <form class="form-valide" action="{{route('guardaresp')}}" method='POST' enctype='multipart/form-data'>
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="empresa">ID RESPONSABLE<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="empresa" name='Id_resp' value="{{$Id_resp}}" readonly='readonly'>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nomemp">NOMBRE<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="Nombre_resp" name='Nombre_resp' value="{{old('Nombre_resp')}}">
                                    @if($errors->first('Nombre_resp'))
                                    <i> {{ $errors->first('Nombre_resp') }} </i>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="Ubicacion">APELLIDO PATERNO<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="app" name='app' value="{{old('app')}}">
                                    @if($errors->first('app'))
                                    <i> {{ $errors->first('app') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="CP">APELLIDO MATERNO<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="apm" name='apm' value="{{old('apm')}}">
                                    @if($errors->first('apm'))
                                    <i> {{ $errors->first('apm') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="rfc">RFC<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="rfc" name='rfc' value="{{old('rfc')}}">
                                    @if($errors->first('rfc'))
                                    <i> {{ $errors->first('rfc') }} </i>
                                    @endif

                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="idempr">EMPRESA<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="idempr" name='idempr'>
                                        @foreach($empresas as $em)
                                        <option value='{{$em->Id_empresa}}'>{{$em->Nomb_emp}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">GUARDAR</button>
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
