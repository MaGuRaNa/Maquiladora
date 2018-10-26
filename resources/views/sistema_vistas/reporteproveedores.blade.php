<html>
<body>
<h1>Reporte de empleados</h1>
<br>
<table border= 1>
<tr><td>Id del proveedor</td><td>Nombre</td><td>Apellido paterno</td><td>Apellido materno</td>
<td>RFC</td><td>Empresa</td><td>Activo</td><td>Modificar</td><td>Eliminar</td></tr>
@foreach($proveedores as $pro)
<tr><td>{{$pro->Id_prov}}</td><td>{{$pro->NombreProv}}</td><td>{{$pro->Ap_pprov}}</td><td>{{$pro->Ap_mprov}}</td><td>{{$pro->RFC_prov}}</td><td>{{$pro->Id_empresa}}</td><td>{{$pro->Activo_prov}}</td>
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








