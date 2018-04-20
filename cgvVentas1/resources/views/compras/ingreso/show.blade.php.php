@extends ('layouts.admin')
@section ('contenido')
	

			
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="proveedor">Proveedor</label>
				<p>{{$ingreso->nombre}}</p>
				
			</div>
		</div>
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label >Comprobante</label>
				<p>{{$ingreso->tipo_comprobante}}</p>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="num_comprobante">Num Comprobante</label>
				<p>{{$ingreso->num_comprobante}}</p>
			</div>
		</div>
	</div>	
	
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-body">
					

					

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<table id="detalles" class="table table-stiped table-bordered table-condensed table-hover">
							<thead style="background-color: teal">
								
								<th>Articulo</th>
								<th>Cantidad</th>
								<th>P Compra</th>
								<th>P Venta</th>
								<th>Subtotal</th>
								
							</thead>

							<tbody>
								@foraech
								
							</tbody>

							<tfoot>
								
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
					<button class="btn btn-danger" type="reset">Cancelar</button>
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
		precio_compra=$("#pprecio_compra").val();
		precio_venta=$("#pprecio_venta").val();

		if (idarticulo!="" && cantidad!="" && cantidad>0 && precio_compra!="" && precio_venta!="") {
			subtotal[cont]=(cantidad*precio_compra);
			total=total + subtotal[cont];
			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_compra[]" value="'+precio_compra+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td></tr>';
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