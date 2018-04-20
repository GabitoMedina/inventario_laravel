<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Listado de Proformas <a href="#"><button class="btn btn-success">Nuevo</button></a></h3>
			
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
						</table>

						
					</div>
					
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>