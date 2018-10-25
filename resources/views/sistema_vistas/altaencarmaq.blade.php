<html>
<body bgcolor="EE99AEE"> <!--EEAAEE lILITA-->
<center><h1> Alta Encargado Maquiladora </h1></center>
<br>
<form action ="{{route('guardaresp')}}" method = 'POST' enctype="multipart/form-data">
{{csrf_field()}}
<center>
@if($errors->first('Id_em')) 
<i> {{ $errors->first('Id_em') }} </i> 
@endif	<br>
        

ID Encargado <input type = 'text' name = 'Id_em' value="{{$Id_em}}" readonly>
<br>
	<br>
Usuario<input type  ='text' name = 'Usuario' value="{{old('Usuario')}}">
<br>
@if($errors->first('Usuario')) 
<i> {{ $errors->first('Usuario') }} </i> 
@endif
	<br>

Contraseña<input type  ='text' name = 'Contrasena' value="{{old('Contrasena')}}">
<br>
@if($errors->first('Contrasena')) 
<i> {{ $errors->first('Contrasena') }} </i> 
@endif
	<br>

Nombre<input type  ='text' name = 'Nombre_enc' value="{{old('Nom_enc')}}">
<br>
@if($errors->first('Nom_enc')) 
<i> {{ $errors->first('Nomb_enc') }} </i> 
@endif
	<br>
Apellido Paterno<input type = 'text' name = 'Ap_penc' value="{{old('app')}}" >
<br>
@if($errors->first('Ap_penc')) 
<i> {{ $errors->first('Ap_penc') }} </i> 
@endif
<br>
Apellido Materno<input type = 'text' name = 'Ap_menc' value="{{old('apm')}}" >
<br>
@if($errors->first('Ap_menc')) 
<i> {{ $errors->first('Ap_menc') }} </i> 
@endif	<br>
<br>
RFC<input type = 'text' name = 'rfc' value="{{old('rfc')}}" >
<br>
@if($errors->first('rfc')) 
<i> {{ $errors->first('rfc') }} </i> 
@endif	<br>
Seleccione una empresa <select name='Id_empresa'>
@foreach($empresas as $emp)
<option value='{{$emp->Id_empresa}}'>{{$emp->Nomb_emp}}</option>
@endforeach
 </select>
 <br>@if($errors->first('archivo')) 
<i> {{ $errors->first('archivo') }} </i> 
@endif <br>
Seleccione foto <input type='file' name='archivo'>


<br><br>
<input type = 'submit' value = 'Guardar'>
</center>
</form>
</body>
</html>