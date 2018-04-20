<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Nueva Proveedor</h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
					<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
		</div>
	</div>

			<?php echo Form::open(array('url'=>'compras/proveedor','method'=>'POST','autocomplete'=>'off')); ?>

			<?php echo e(Form::token()); ?>

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="<?php echo e(old('nombre')); ?>" class="form-control" placeholder="Nombre">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" value="<?php echo e(old('direccion')); ?>" class="form-control" placeholder="Dirección">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="tipo_documento">Documento</label>
				<select name="tipo_documento" class="form-control">
					<option value="CI">CI</option>
					<option value="RUC">RUC</option>
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="num_documento">Número Documento</label>
				<input type="text" name="num_documento"  value="<?php echo e(old('num_documento')); ?>" class="form-control" placeholder="Número del documento">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="telefono">Teléfono</label>
				<input type="text" name="telefono" value="<?php echo e(old('telefono')); ?>" class="form-control" placeholder="Teléfono">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="Email">
			</div>
		</div>
	
		<dir class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>
			<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>