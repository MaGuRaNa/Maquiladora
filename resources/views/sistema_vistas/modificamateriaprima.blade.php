@extends('sistema_vistas.index')
@section('Encabezado')
Materia Prima
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


                        <form action="{{route('editamateria')}}" method='POST' enctype='multipart/form-data'>
                            {{csrf_field()}}

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="idmat">ID MATERIA<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="idmat" type='text' name='idmat' value="{{$materia->Id_mat}}" readonly='readonly'>
                                    @if($errors->first('idmat'))
                                    <i> {{ $errors->first('idmat') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="nommat">NOMBRE<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="nommat" type='text' name='nommat' value="{{$materia->Nom_mat}}">
                                    @if($errors->first('nommat'))
                                    <i> {{ $errors->first('nommat') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="desc">DESCRIPCION<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <textarea class="form-control" name="desc" id="desc" cols="30" rows="10">{{$materia->Descripcion}}</textarea>
                                    @if($errors->first('desc'))
                                    <i> {{ $errors->first('desc') }} </i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="cant">CANTIDAD<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="cant" type='text' name='cant' value="{{$materia->Cantidad}}">
                                    @if($errors->first('cant'))
                                    <i> {{ $errors->first('cant') }} </i>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="pes">PESO (GRAMOS)<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="pes" type='text' name='pes' value="{{$materia->Peso}}">
                                    @if($errors->first('pes'))
                                    <i> {{ $errors->first('pes') }} </i>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="fecha">FECHA<span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="fecha" type='text' name='fecha' value="{{$materia->Fecha}}" readonly='readonly'>
                                    @if($errors->first('fecha'))
                                    <i> {{ $errors->first('fecha') }} </i>
                                    @endif
                                </div>
                            </div>

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
