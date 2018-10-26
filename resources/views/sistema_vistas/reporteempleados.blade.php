<html>
<body>
<h1>Reporte de empleados</h1>
<br>
<table border= 1>
<tr><td>Id del empleado</td><td>Nombre</td><td>Apellido paterno</td><td>Apellido materno</td>
<td>RFC</td><td>Telefono</td><td>Dirección</td><td>Activo</td><td>Modificar</td><td>Eliminar</td></tr>
@foreach($empleados as $em)
<tr><td>{{$em->Id_emp}}</td><td>{{$em->NombreE}}</td><td>{{$em->Ap_pat}}</td><td>{{$em->Ap_mat}}</td><td>{{$em->RFC}}</td><td>{{$em->Telefono}}</td><td>{{$em->Direccion}}</td><td>{{$em->Activo_empl}}</td>
<td> 
<a href=""> 
Icono M.
</a>
</td>
<td>
<a href=""> 
Icono E.
</a>
</td>
</tr>
@endforeach
</table>
</body>
</html>








