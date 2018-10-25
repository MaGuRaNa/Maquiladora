<html>
<body bgcolor="EE99AEE"> <!--EEAAEE lILITA-->
<center><h1> Alta Encargado Maquiladora </h1></center>
<br>
<form action ="{{route('guardaenc')}}" method = 'POST' enctype="multipart/form-data">
{{csrf_field()}}
<center>

        

<!-- ID Encargado <input type = 'text' name = 'Id_em' value="" readonly> -->
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

Nombre<input type  ='text' name = 'Nom_enc' value="{{old('Nom_enc')}}">
<br>
@if($errors->first('Nom_enc')) 
<i> {{ $errors->first('Nom_enc') }} </i> 
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
RFC<input type = 'text' name = 'RFC_enc' value="{{old('RFC_enc')}}" >
<br>
@if($errors->first('RFC_enc')) 
<i> {{ $errors->first('RFC_enc') }} </i> 
@endif	<br>
Seleccione una empresa <select name='Id_empresa'>
@foreach($empresas as $emp)
<option value='{{$emp->Id_empresa}}'>{{$emp->Nomb_emp}}</option>
@endforeach
 </select>
 <br>@if($errors->first('Imagen_enc')) 
<i> {{ $errors->first('Imagen_enc') }} </i> 
@endif <br>
Seleccione foto <input type='file' name='archivo'>


<br><br>
<input type = 'submit' value = 'Guardar'>
</center>
</form>
</body>
</html>