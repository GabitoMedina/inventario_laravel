<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Listado de Ingresos <a href="ingreso/create"><button class="btn btn-success">Nuevo</button></a></h3>
			<?php echo $__env->make('compras.ingreso.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-condensed table-hover">
							<thead>
								<!-- <th>Id</th> -->
								<th>Fecha</th>
								<th>Proveedor</th>
								<th>Comprobante</th>
								<th>Iva</th>
								<th>Total</th>
								<th>Estado</th>
								<th>Opciones</th>
							</thead>

							<?php foreach($ingresos as $ing): ?>
							<tr>
								<!-- <td><?php echo e($ing->idingreso); ?></td> -->
								<td><?php echo e($ing->fecha); ?></td>
								<td><?php echo e($ing->nombre); ?></td>
								<td><?php echo e($ing->tipo_comprobante.': '.$ing->num_comprobante); ?></td>
								<td><?php echo e($ing->iva); ?></td>
								<td><?php echo e($ing->total); ?></td>
								<td><?php echo e($ing->estado); ?></td>
								<td> <a href="<?php echo e(URL::action('IngresoController@show',$ing->idingreso)); ?>"><button class="btn btn-primary">Detalles</button></a>
									<a href="" data-target="#modal-delete-<?php echo e($ing->idingreso); ?>" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
								</td>0
							</tr>
							<?php echo $__env->make('compras.ingreso.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<?php endforeach; ?>
						</table>
					</div>
					<?php echo e($ingresos->render()); ?>

				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>