@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Listado de Proformas <a href="proformas/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('proformas.search')
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-condensed table-hover">
							<thead>
								<!-- <th>Id</th> -->
								<th>Fecha</th>
								<th>Cliente</th>
								<th>Comprobante</th>
								<th>Iva</th>
								<th>Total</th>
								<th>Estado</th>
								<th>Opciones</th>
							</thead>
							@foreach ($proformas as $prf)
							<tr>
								<!-- <td>{{ $ing->idingreso}}</td> -->
								<td>{{ $prf->fecha}}</td>
								<td>{{ $prf->nombre}}</td>
								<td>{{ $prf->tipo_comprobante.': '.$prf->num_comprobante}}</td>
								<td>{{ $prf->iva}}</td>
								<td>{{ $prf->total}}</td>
								<td>{{ $prf->estado}}</td>
								<td> <a href="{{URL::action('ProformaController@show',$prf->idproforma)}}"><button class="btn btn-primary">Detalles</button></a>
									<a href="" data-target="#modal-delete-{{$prf->idproforma}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
								</td>0
							</tr>
							@include('proformas.modal')
							@endforeach
						</table>
					</div>
					{{$proformas->render()}}
				</div>
			</div>
		</div>
	</div>
@endsection