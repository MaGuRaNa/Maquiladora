<html>
<body>
<h1>Alta Materia</h1>
<br>
<table border= 1>
<tr><td>Id de maeria</td><td>Nombre</td><td>Descripción</td><td>Cantidad</td>
<td>Peso</td><td>Fechs</td><td>Activo</td><td>Modificar</td><td>Eliminar</td></tr>
@foreach($materia_primas as $mat)
<tr><td>{{$mat->Id_mat}}</td><td>{{$mat->Nom_mat}}</td><td>{{$mat->Descripcion}}</td><td>{{$mat->Cantidad}}</td><td>{{$mat->Peso}}</td><td>{{$mat->Fecha}}</td><td>{{$mat->Activo_mat}}</td>
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








