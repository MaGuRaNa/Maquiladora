<!DOCTYPE html>
<html>
<head>
	<title>Reporte de Responsable</title>
</head>
<body bgcolor="AAAAEE"> 
<h1>Reporte de Responsable</h1>
<table border="1">
<tr><td>Clave</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>RFC</td><td>Activo</td></tr>
@foreach($responsables as $re)
<tr><td>{{$re->Id_resp}}</td><td>{{$re->Nombre_resp}}</td><td>{{$re->Ap_presp}}</td>
<td>{{$re->Ap_mresp}}</td><td>{{$re->RFC_resp}}</td><td>{{$re->Activo_resp}}</td></tr>
@endforeach
</table>
</body>
</html>