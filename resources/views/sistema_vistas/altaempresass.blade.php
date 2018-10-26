@extends('sistema_vistas.index')
@section('Encabezado')
Empresas
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


                        <form class="form-valide" action="{{route('guardarempr')}}" method='POST' enctype='multipart/form-data'>
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="empresa">ID EMPRESA<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="empresa" name='Id_empresa' value="{{$Id_empresa}}" readonly='readonly'>
                                                                   </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nomemp">NOMBRE<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="Nomb_emp" name='Nomb_emp' value="{{old('Nomb_emp')}}">
                                    @if($errors->first('Nomb_emp'))
        <i> {{ $errors->first('Nomb_emp') }} </i>
        @endif 
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="Ubicacion">Ubicacion<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="Ubicacion" name='Ubicacion' value="{{old('Ubicacion')}}">
                                    @if($errors->first('Ubicacion'))
                                    <i> {{ $errors->first('Ubicacion') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="CP">CODIGO POSTAL<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="CP" name='CP' value="{{old('CP')}}">
                                    @if($errors->first('CP'))
                                    <i> {{ $errors->first('CP') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="Telefono">TELÉFONO<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="Telefono" name='Telefono' value="{{old('Telefono')}}">
                                    @if($errors->first('Telefono'))
                                    <i> {{ $errors->first('Telefono') }} </i>
                                    @endif
                                </div>
                            </div>

                                                 
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
