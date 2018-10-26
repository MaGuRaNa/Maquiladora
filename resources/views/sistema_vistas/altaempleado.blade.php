@extends('sistema_vistas.index')
@section('Encabezado')
Empleado
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


                        <form class="form-valide" action="{{route('guardaempleado')}}" method='POST' enctype='multipart/form-data'>
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="emplid">ID EMPLEADO<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="emplid" name='idempl' value="{{$emplid}}" readonly='readonly'>
                                    @if($errors->first('idempl'))
                                    <i> {{ $errors->first('idempl') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nomempl">NOMBRE<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="nomempl" name='nomempl' value="{{old('nomempl')}}">
                                    @if($errors->first('nomempl'))
                                    <i> {{ $errors->first('nomempl') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="appempl">APELLIDO PATERNO<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="appempl" name='appempl' value="{{old('appempl')}}">
                                    @if($errors->first('appempl'))
                                    <i> {{ $errors->first('appempl') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="apmempl">APELLIDO MATERNO<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="apmempl" name='apmempl' value="{{old('apmempl')}}">
                                    @if($errors->first('apmempl'))
                                    <i> {{ $errors->first('apmempl') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="rfcempl">RFC<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="rfcempl" name='rfcempl' value="{{old('rfcempl')}}">
                                    @if($errors->first('rfcempl'))
                                    <i> {{ $errors->first('rfcempl') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="rfcempl">TELÉFONO<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="rfcempl" name='telempl' value="{{old('telempl')}}">
                                    @if($errors->first('telempl'))
                                    <i> {{ $errors->first('telempl') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="dirempl">DIRECCIÓN<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="dirempl" name='dirempl' value="{{old('dirempl')}}">
                                    @if($errors->first('dirempl'))
                                    <i> {{ $errors->first('dirempl') }} </i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                                </div>
                            </div>
                            <!--                            <input type='submit' value='Guardar'>-->
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
</div>

@stop
