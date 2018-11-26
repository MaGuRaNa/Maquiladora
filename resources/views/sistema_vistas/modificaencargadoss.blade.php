@extends('sistema_vistas.index')
@section('Encabezado')
Encargados
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


                        <form class="form-valide" action="{{route('guardaenc')}}" method='POST' enctype='multipart/form-data'>
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="encargado">ID ENCARGADO<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="Id_em" name='Id_em' value="{{$encargados->Id_em}}" readonly='readonly'>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nomemp">USUARIO<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="Usuario" name='Usuario' value="{{$encargados->Usuario}}">
                                    @if($errors->first('Usuario'))
                                    <i> {{ $errors->first('Usuario') }} </i>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="Contrasena">CONTRASEÑA<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='password' id="Contrasena" name='Contrasena' value="{{$encargados->Contrasena}}">
                                    @if($errors->first('Contrasena'))
                                    <i> {{ $errors->first('Contrasena') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="CP">NOMBRE<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="Nom_enc" name='Nom_enc' value="{{$encargados->Nom_enc}}">
                                    @if($errors->first('Nom_enc'))
                                    <i> {{ $errors->first('Nom_enc') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="APM">APELLIDO PATERNO<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="Ap_penc" name='Ap_penc' value="{{$encargados->Ap_penc}}">
                                    @if($errors->first('Ap_penc'))
                                    <i> {{ $errors->first('Ap_penc') }} </i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="APP">APELLIDO MATERNO<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="Ap_menc" name='Ap_menc' value="{{$encargados->Ap_menc}}">
                                    @if($errors->first('Ap_menc'))
                                    <i> {{ $errors->first('Ap_menc') }} </i>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="RFC">RFC<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="RFC_enc" name='RFC_enc' value="{{$encargados->RFC_enc}}">
                                    @if($errors->first('RFC_enc'))
                                    <i> {{ $errors->first('RFC_enc') }} </i>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="Telefono">SELECCIONE UNA FOTO<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='file' id="Imagen_enc" name='Imagen_enc'>
                                    @if($errors->first('Imagen_enc'))
                                    <i> {{ $errors->first('Imagen_enc') }} </i>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="Telefono">SELECCIONE UNA EMPRESA<span class="text-danger">*</span></label>
                                <div class="col-lg-6">

                                    <select name='Id_empresa' class="form-control custom-select">
                                      <option value="{{$Idem}}">{{$empresa}}</option>
                                        @foreach($otrasempresas as $oem)
                                        <option value='{{$oem->Id_empresa}}'>{{$oem->Nomb_emp}}</option>
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
