@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<<<<<<< HEAD
			<h3>Editar Cliente: {{ $persona->nombre }}</h3>
=======
			<h3>Editar Cliente: {{ $articulo->nombre }}</h3>
>>>>>>> afaa1ffcd9d2a747cac428670c1eceba4829a809
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

<<<<<<< HEAD
			{!!Form::model($persona,['method'=>'PATCH','route'=>['ventas.cliente.update',$persona->idpersona]])!!}
=======
			{!!Form::model($articulo,['method'=>'PATCH','route'=>['cgv.articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
>>>>>>> afaa1ffcd9d2a747cac428670c1eceba4829a809
			{{Form::token()}}
		<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
<<<<<<< HEAD
				<input type="text" name="nombre" required value="{{$persona->nombre}}" class="form-control" placeholder="Nombre">
=======
				<input type="text" name="nombre" required value="{{$articulo->nombre}}" class="form-control">
>>>>>>> afaa1ffcd9d2a747cac428670c1eceba4829a809
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
<<<<<<< HEAD
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" value="{{$persona->direccion}}" class="form-control" placeholder="Dirección">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="tipo_documento">Documento</label>
				<select name="tipo_documento" class="form-control">
					@if ($persona->tipo_documento=='CI')
					<option value="CI" selected>CI</option>
					<option value="RUC">RUC</option>
					<option value="Pasaporte">Pasaporte</option>
					@elseif ($persona->tipo_documento=='RUC')
					<option value="CI" >CI</option>
					<option value="RUC" selected>RUC</option>
					<option value="Pasaporte">Pasaporte</option>
					@else
					<option value="CI" >CI</option>
					<option value="RUC">RUC</option>
					<option value="Pasaporte" selected>Pasaporte</option>
					@endif
				</select>
=======
				<label>Categoria</label>
				<select name="idcategoria" class="form-control">
					@foreach ($categorias as $cat)
					 @if ($cat->idcategoria==$articulo->idcategoria)
						<option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
						@else
						<option value="{{$cat->idcategoria}}" >{{$cat->nombre}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="codigo">Código</label>
				<input type="text" name="codigo" required value="{{$articulo->codigo}}" class="form-control" >
>>>>>>> afaa1ffcd9d2a747cac428670c1eceba4829a809
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
<<<<<<< HEAD
				<label for="num_documento">Número Documento</label>
				<input type="text" name="num_documento"  value="{{$persona->num_documento}}" class="form-control" placeholder="Número del documento">
=======
				<label for="stock">Stock</label>
				<input type="text" name="stock" required value="{{$articulo->stock}}" class="form-control" >
>>>>>>> afaa1ffcd9d2a747cac428670c1eceba4829a809
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
<<<<<<< HEAD
				<label for="telefono">Teléfono</label>
				<input type="text" name="telefono" value="{{$persona->telefono}}" class="form-control" placeholder="Teléfono">
=======
				<label for="descripcion">Descripción</label>
				<input type="text" name="descripcion" value="{{$articulo->descripcion}}" class="form-control" placeholder="Descripción del producto">
>>>>>>> afaa1ffcd9d2a747cac428670c1eceba4829a809
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
<<<<<<< HEAD
				<label for="email">Email</label>
				<input type="email" name="email" value="{{$persona->email}}" class="form-control" placeholder="Email">
=======
				<label for="imagen">Imagen</label>
				<input type="file" name="imagen"  class="form-control" >
				@if (($articulo->imagen)!="")
					<img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" height="200px" width="300px">
				@endif
>>>>>>> afaa1ffcd9d2a747cac428670c1eceba4829a809
			</div>
		</div>
	
		<dir class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>
			{!!Form::close()!!}

@endsection