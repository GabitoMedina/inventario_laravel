@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Nueva Proforma</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

			{!!Form::open(array('url'=>'proformas','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="proveedor">Proveedor</label>
				<select name="idproveedor" id="idproveedor" class="form-control selectpicker" data-live-search="true">
					@foreach ($personas as $persona)
					  <option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
					@endforeach
				</select>
				
			</div>
		</div>
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label >Comprobante</label>
				<select name="tipo_comprobante" class="form-control">
					<option value="Factura">Factura</option>
					<option value="Nota de Venta">Ticket</option>
				</select>
				
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="num_comprobante">Num Comprobante</label>
				<input type="text" name="num_comprobante" required value="{{old('num_comprobante')}}" class="form-control" placeholder="Número Comprobante">
			</div>
		</div>
	</div>	
	
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-body">
					<div class="col-lg-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<label>Articulo</label>
							<select name="pidarticulo" class="form-control selectpicker" id="pidarticulo" data-live-search="true">
								@foreach($articulos as $articulo)
								<option value="{{$articulo->idarticulo}}">{{$articulo->articulo}}</option>
								@endforeach
							</select>

						</div>

					</div>
					<div class="col-lg-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<label for="cantidad">Cantidad</label>
							<input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="cantidad">
						</div>
					</div>

					<div class="col-lg-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<label for="cantidad">Num. Serie</label>
							<input type="number" name="pnum_serie" id="pnum_serie" class="form-control" placeholder="NumSerie">
						</div>
					</div>

					<div class="col-lg-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<label for="precio_compra">Precio Compra</label>
							<input type="number" name="pprecio_compra" id="pprecio_compra" class="form-control" placeholder="P. Compra">				
						</div>
					</div>

					<div class="col-lg-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<label for="precio_venta">Precio Venta</label>
							<input type="number" name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="P. Venta">
							
						</div>

					</div>

					<div class="col-lg-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>						
						</div>
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<table id="detalles" class="table table-stiped table-bordered table-condensed table-hover">
							<thead style="background-color: teal">
								<th>Opciones</th>
								<th>Articulo</th>
								<th>Cantidad</th>
								<th>Num. Serie</th>
								<th>P Compra</th>
								<th>P Venta</th>
								<th>Subtotal</th>
								
							</thead>

							<tbody>
								
							</tbody>

							<tfoot>
								<th>TOTAL</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th><h4 id="total">$/. 0.00</h4></th>
								
							</tfoot>
							
						</table>
					</div>					
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
				<div class="form-group">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<a class="btn btn-danger" href="{{ route('proformas.index') }}"> Cancelar</a>
				</div>
			</div>

		</div>

				
	
		
		
	
			{!!Form::close()!!}
@push('scripts')
<script>
	$(document).ready(function(){
		$('#bt_add').click(function(){
			agregar();
		});
	});
	var cont=0;
	total=0;
	subtotal=[];
	$("#guardar").hide();
	function agregar(){
		idarticulo=$("#pidarticulo").val();
		articulo=$("#pidarticulo option:selected").text();
		cantidad=$("#pcantidad").val();
		num_serie=$("#pnum_serie").val();
		precio_compra=$("#pprecio_compra").val();
		precio_venta=$("#pprecio_venta").val();

		if (idarticulo!="" && cantidad!="" && cantidad>0 && num_serie!="" && precio_compra!="" && precio_venta!="") {
			subtotal[cont]=(cantidad*precio_compra);
			total=total + subtotal[cont];
			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td> <td><input type="hidden" name="num_serie[]" value="'+num_serie+'">'+num_serie+'</td> <td><input type="number" name="precio_compra[]" value="'+precio_compra+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td></tr>';
			cont++;
			limpiar();
			$("#total").html("$/."+total);
			evaluar();
			$('#detalles').append(fila);
		}else
		{
			alert("error al ingresar el detalle del ingreso, revise datos articulo");
		}

	}
	function limpiar(){
		$("pcantidad").val("");
		$("pprecio_compra").val("");
		$("pprecio_venta").val("");
	}

	function evaluar(){
		if (total>0)
		{
			$("#guardar").show();
		}else{
			$("#guardar").hide();
		}

	}
	function eliminar(index){
		total=total-subtotal[index];
		$("#total").html("$/."+ total);
		$("#fila" + index).remove();
		evaluar();
	}
</script>

@endpush

@endsection