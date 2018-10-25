<!DOCTYPE html>
<html>
<head>
	<title>Reporte de empresas</title>
</head>
<body bgcolor="AAAAEE"> 
<h1>Reporte de Empresa</h1>
<table border="1">
<tr><td>Clave</td><td>Nombre</td><td>Ubicacion</td><td>Telefono</td><td>Activo_empr</td></tr>
@foreach($empresas as $em)
<tr><td>{{$em->Id_empresa}}</td><td>{{$em->Nomb_emp}}</td><td>{{$em->Ubicacion}}</td>
<td>{{$em->Telefono}}</td><td>{{$em->Activo_empr}}</td></tr>
@endforeach
</table>
</body>
</html>