@extends('sistema_vistas.indexformularios')
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
                                <label class="col-lg-4 col-form-label" for="Calle">CALLE<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="Calle" name='Calle' value="{{old('Calle')}}">
                                    @if($errors->first('Calle'))
                                    <i> {{ $errors->first('Calle') }} </i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="Col">COLONIA<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="Col" name='Col' value="{{old('Col')}}">
                                    @if($errors->first('Col'))
                                    <i> {{ $errors->first('Col') }} </i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="loc">LOCALIDAD<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="loc" name='loc' value="{{old('loc')}}">
                                    @if($errors->first('loc'))
                                    <i> {{ $errors->first('loc') }} </i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nui">NUM INT<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' maxlength="3" id="nui" name='nui' value="{{old('nui')}}">
                                    @if($errors->first('nui'))
                                    <i> {{ $errors->first('nui') }} </i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nue">NUM EXT<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" type='text' id="nue"  maxlength="3" name='nue' value="{{old('nue')}}">
                                    @if($errors->first('nue'))
                                    <i> {{ $errors->first('nue') }} </i>
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
