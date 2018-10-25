<html>
<body bgcolor="EE99AEE"> <!--EEAAEE lILITA-->
<center><h1> Alta Responsable </h1></center>
<br>
<form action ="{{route('guardaresp')}}" method = 'POST' enctype="multipart/form-data">
{{csrf_field()}}
<center>
@if($errors->first('Id_resp')) 
<i> {{ $errors->first('Id_resp') }} </i> 
@endif	<br>
        

Clave profesor <input type = 'text' name = 'Id_resp' value="{{$Id_resp}}" readonly>
<br>
	<br>

Nombre<input type  ='text' name = 'Nombre_resp' value="{{old('Nombre_resp')}}">
<br>
@if($errors->first('Nombre_resp')) 
<i> {{ $errors->first('Nombre_resp') }} </i> 
@endif
	<br>
Apellido Paterno<input type = 'text' name = 'app' value="{{old('app')}}" >
<br>
@if($errors->first('app')) 
<i> {{ $errors->first('app') }} </i> 
@endif
<br>
Apellido Materno<input type = 'text' name = 'apm' value="{{old('apm')}}" >
<br>
@if($errors->first('apm')) 
<i> {{ $errors->first('apm') }} </i> 
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


<br><br>
<input type = 'submit' value = 'Guardar'>
</center>
</form>
</body>
</html>