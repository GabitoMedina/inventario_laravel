@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Ingrese Nuevo Servicio</h3>
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
	<div class="row">
		<center><h2>Datos Cliente</h2></center>
	</div>

			{!!Form::open(array('url'=>'ventas/servicio','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="proveedor">Cliente</label>
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
					<option value="Factura">Orden de servicio</option>
					<!-- <option value="Nota de Venta">Ticket</option> -->
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
		<center><h2>Observaciones para el Servicio</h2></center>
	</div>
	
		<table border="1" align="center">
				<tr>
					<td> Nombre</td>
					<td><input name="nombre" type="text" size="35" maxlength="35">
				    
				</tr>
				<tr>
				    
				        <td> Apellido Paterno</td>
				        <td><input name="apellidoP" type="text" size="35" maxlength="35">

				</tr>
				<tr>
				         <td> Apellido Materno</td>
				         <td><input name="apellidoM" type="text" size="35" maxlength="35">

				</tr>
				<tr>
				       <td> E-mail</td>
				       <td><input name="email" type="text" size="35" maxlength="35">

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
		
	
			{!!Form::close()!!}


@endsection