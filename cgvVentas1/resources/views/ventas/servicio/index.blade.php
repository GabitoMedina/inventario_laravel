@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Listado de Servicios <a href="servicio/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('ventas.servicio.search')
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-condensed table-hover">
							<thead>
								<!-- <th>Id</th> -->
								<th>Fecha</th>
								<th>CLiente</th>
								<th>Comprobante</th>
								<!-- <th>Detalle</th> -->
								<th>Total</th>
								<th>Estado</th>
								<th>Opciones</th>
							</thead>

							@foreach ($servicios as $serv)
							<tr>
								<!-- <td>{{ $ing->idingreso}}</td> -->
								<td>{{ $serv->fecha}}</td>
								<td>{{ $serv->nombre}}</td>
								<td>{{ $serv->tipo_comprobante.': '.$serv->num_comprobante}}</td>
								<!-- <td>{{ $serv->iva}}</td> -->
								<td>{{ $serv->total}}</td>
								<td>{{ $serv->estado}}</td>
								<td> <a href="{{URL::action('ServicioController@show',$serv->idservicio)}}" target="_blank"><button class="btn btn-primary">Detalles</button></a>
									<a href="" data-target="#modal-delete-{{$serv->idservicio}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
									<p><a href="{{ route('vantas.servicio.pdf') }}" class=" btn btn-sm btn-primary">Descargar productos en  PDF</a>
									</p>
								</td>
							</tr>
							@include('ventas.servicio.modal')
							@endforeach
						</table>
					</div>
					{{$servicios->render()}}
				</div>
			</div>
		</div>
	</div>
@endsection