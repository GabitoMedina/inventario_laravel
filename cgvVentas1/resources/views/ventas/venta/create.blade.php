@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Nuevo Venta</h3>
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

			{!!Form::open(array('url'=>'ventas/venta','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="cliente">Cliente</label>
				<select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">
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

	<table border="1" align="center">
<tr>
       <td> Nombre</td>
       <td><input name="nombre" type="text" size="35" maxlength="35">

    </tr>
<tr>
       <td> Apellido Paterno</td>
       <td><input name="apellidoP" type="text" size="120" maxlength="35">

    </tr>
<tr>
       <td> Apellido Materno</td>
       <td><input name="apellidoM" type="text" size="35" maxlength="35">

    </tr>

   
       <tr><td size="120">Detalles</td></tr>
       
    

<tr>
       <td> E-mail</td>
       <td><input name="email" type="text" size="35" maxlength="35">
       	<tr>
       		<td>Telf</td>
       	</tr>

    </tr>
<tr>
         <td> Edad </td>
         <td><input name="edad" type="text" size="2" maxlength="2">
    </tr>
<tr >
         <td> Sexo </td>
         <td>
      <input  type="radio" name="rd">Masculino
      <input type="radio" name="rd">Femenino
      <input type="button" name="enviar" title="enviar" value="Enviar">
        </td>
    
     </tr>
</table>

<table id="detalles" class="table table-stiped table-bordered table-condensed table-hover">
							<thead style="background-color: teal">
								<th>Opciones</th>
								<th>Articulo</th>
								<th>Cantidad</th>				
								<th>P Venta</th>
								<th>Descuento</th>
								<th>Subtotal</th>
								
							</thead>

							<tbody>
								
							</tbody>

							<tfoot>
								<th>
									<tr>
										<td>nombre<input type="text" name="opc"></td>
									</tr>
								</th>
								<th></th>
								<th></th>
								<th></th>
								<th>TOTAL</th>
								<th><h4 id="total">$ 0.00</h4> <input type="hidden" name="total_venta" id="total_venta"></th>
								
							</tfoot>
							
						</table>	
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-body">
					<div class="col-lg-4 col-sm-4 col-xs-12">
						<div class="form-group">
							<label>Articulo</label>
							<select name="pidarticulo" class="form-control selectpicker" id="pidarticulo" data-live-search="true">
								@foreach($articulos as $articulo)
								<option value="{{$articulo->idarticulo}}_{{$articulo->stock}}_{{$articulo->precio_promedio}}">{{$articulo->articulo}}</option>
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
							<label for="stock">Stock</label>
							<input type="number" disabled name="pstock" id="pstock" class="form-control" placeholder="Stock">
						</div>
					</div>

					<div class="col-lg-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<label for="cantidad">Precio venta</label>
							<input type="number" name="pprecio_venta" disabled id="pprecio_venta" class="form-control" placeholder="cantidad">
						</div>
					</div>

					<div class="col-lg-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<label for="descuento">Descuento</label>
							<input type="number" name="pdescuento" id="pdescuento" class="form-control" placeholder="Descuento">				
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
								<th>P Venta</th>
								<th>Descuento</th>
								<th>Subtotal</th>
								
							</thead>

							<tbody>
								
							</tbody>

							<tfoot>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th>TOTAL</th>
								<th><h4 id="total">$ 0.00</h4> <input type="hidden" name="total_venta" id="total_venta"></th>
								
							</tfoot>
							
						</table>
					</div>					
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
				<div class="form-group">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<a class="btn btn-danger" href="{{ route('ventas.venta.index') }}"> Cancelar</a>
				</div>
			</div>

		</div>		
	
			{!!Form::close()!!}
@push('scripts')
<script>
	$(document).ready(function(){
		$('#bt_add').click(function(){
			
			mostrarValores();
			agregar();
		});
	});
	
	var cont=0;
	total=0;
	subtotal=[];
	
	$("#pidarticulo").change(mostrarValores);
	$("#guardar").hide();

	function mostrarValores()
		{
			datosArticulo=document.getElementById('pidarticulo').value.split('_');
			$("#pprecio_venta").val(datosArticulo[2]);
			$("#pstock").val(datosArticulo[1]);

		}

	function agregar()
	{
			// datosArticulo=document.getElementById('pidarticulo'.value.split('_');
			datosArticulo=document.getElementById('pidarticulo').value.split('_');
			$("#pprecio_venta").val(datosArticulo[2]);
			$("#pstock").val(datosArticulo[1]);
			idarticulo=datosArticulo[0];
			
			articulo=$("#pidarticulo option:selected").text();
			cantidad=$("#pcantidad").val();
			descuento=$("#pdescuento").val(); 
			precio_venta=$("#pprecio_venta").val();
			stock=$("#pstock").val(); 

			if (idarticulo!="" && cantidad!="" && cantidad>0 && descuento!="" && precio_venta!="")
			{
				if (stock>0)
				{
					subtotal[cont]=(cantidad*precio_venta-descuento);
					total=total + subtotal[cont];
					var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]"  value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]"  readonly value="'+cantidad+'"></td><td><input type="number" name="precio_venta[]" readonly value="'+precio_venta+'"></td><td><input type="number" name="descuento[]" readonly value="'+descuento+'"></td><td>'+subtotal[cont]+'</td></tr>';
					cont++;
					limpiar();
					$("#total").html("$"+total);
					$("#total_venta").val(total);
					evaluar();
					$('#detalles').append(fila);
				}
				else
				{
					alert('cantida supera stock');
				}


			}
			// else
			// {
			// 	alert('error al ingresar venta');
			// }
		}
		

	// end key
			

		
	function limpiar(){
		$("pcantidad").val("");
		$("pdescuento").val("");
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
		$('#total_venta').val(total);
		$("#fila" + index).remove();
		evaluar();
	}
</script>

@endpush

@endsection