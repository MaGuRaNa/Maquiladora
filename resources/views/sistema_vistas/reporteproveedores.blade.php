@extends('sistema_vistas.indextablas')
@section('Encabezado')
Proveedores
@stop
@section('Clasificacion')
Consultas
@stop
@section('Contenido')
@if(Session::has('flash_message'))
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		setTimeout(function() {
			$(".desaparece").fadeOut(100);
		}, 1500);

	});

</script>


<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
	   setTimeout(function() {
			$("#mostrarmodal").fadeOut(100);
		}, 1500);
   });
</script>
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Cabecera de la ventana</h3>
     </div>
         <div class="modal-body">
            <h4>{{Session::get('flash_message')}}</h4>
            Mas texto en la ventana.    
     </div>
         <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
     </div>
      </div>
   </div>
</div>

@endif
<div class="container-fluid">
	<!-- Start Page Content -->
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">

					<h4 class="card-title">Tabla de registros</h4>

					<a href="{{URL::to('/operacionproveedor')}}" style="color:hsla(0,100%,50%,0.5);">Historial de eliminaciones</a>
					<!--                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>-->
					<div class="table-responsive m-t-40">
						<table id="example233" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Clave</th>
									<th>Nombre</th>
									<th>Apellido paterno</th>
									<th>Apellido materno</th>
									<th>RFC</th>
									<th>Empresa</th>
									<!-- <th>Activo</th>-->
									<th>Operaciones</th>
								</tr>
							</thead>
							<tbody>
								@if(count($proveedores) > 0)
								@foreach($proveedores as $pro)
								<tr>
									<td>{{$pro->Id_prov}}</td>
									<td>{{$pro->NombreProv}}</td>
									<td>{{$pro->Ap_pprov}}</td>
									<td>{{$pro->Ap_mprov}}</td>
									<td>{{$pro->RFC_prov}}</td>
									<td>{{$pro->empre}}</td>

									<td>
										<a href="{{URL::action('proveedor@modificaproveedor',['Id_prov'=>$pro->Id_prov])}}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar registro">
											<i class="fas fa-edit"> Editar</i>
										</a>

										<a href="{{URL::action('proveedor@eliminaproveedor',['Id_prov'=>$pro->Id_prov])}}">
											<i class="fas fa-trash"> Borrar</i>
										</a>
									</td>
								</tr>
								@endforeach
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
