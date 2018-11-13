

@extends('sistema_vistas.index')
@section('Encabezado')
Registro Ralizado exitosamente
@stop
@section('Clasificacion')
Registro
@stop
@section('Contenido')
<h1>{{$proceso}}</h1>
<br>
<h1>{{$mensaje}}</h1>
@stop
