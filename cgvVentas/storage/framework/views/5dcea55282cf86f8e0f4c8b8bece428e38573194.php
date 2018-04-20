<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<<<<<<< HEAD
			<h3>Listado de Clientes <a href="cliente/create"><button class="btn btn-success">Nuevo</button></a></h3>
=======
			<h3>Listado de Clientes <a href="articulo/create"><button class="btn btn-success">Nuevo</button></a></h3>
>>>>>>> afaa1ffcd9d2a747cac428670c1eceba4829a809
			<?php echo $__env->make('ventas.cliente.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-condensed table-hover">
							<thead>
								<th>Id</th>
								<th>Nombre</th>
<<<<<<< HEAD
								<th>Tipo Dod</th>
								<th>Número de Doc</th>
								<th>Teléfono</th>
=======
								<th>Tipo_Doc</th>
								<th>Número_Doc</th>
								<th>Telefono</th>
>>>>>>> afaa1ffcd9d2a747cac428670c1eceba4829a809
								<th>Email</th>
								<th>Opciones</th>
							</thead>

							<?php foreach($personas as $per): ?>
							<tr>
								<td><?php echo e($per->idpersona); ?></td>
								<td><?php echo e($per->nombre); ?></td>
								<td><?php echo e($per->tipo_documento); ?></td>
								<td><?php echo e($per->num_documento); ?></td>
								<td><?php echo e($per->telefono); ?></td>
<<<<<<< HEAD
								<td><?php echo e($per->email); ?></td>
								<td> <a href="<?php echo e(URL::action('ClienteController@edit',$per->idpersona)); ?>"><button class="btn btn-info">Editar</button></a>
									<a href="" data-target="#modal-delete-<?php echo e($per->idpersona); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
=======
						
								<td><?php echo e($art->email); ?></td>
								<td> <a href="<?php echo e(URL::action('ClienteController@edit',$per->idpersona)); ?>"><button class="btn btn-info">Editar</button></a>
									<a href="" data-target="#modal-delete-<?php echo e($art->idpersona); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
>>>>>>> afaa1ffcd9d2a747cac428670c1eceba4829a809
								</td>
							</tr>
							<?php echo $__env->make('ventas.cliente.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<?php endforeach; ?>
						</table>
					</div>
					<?php echo e($personas->render()); ?>

				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>