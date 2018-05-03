<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$prof->idproforma}}">
	{{Form::open(array('action'=>array('ProformaController@destroy',$prof->idproforma),'method'=>'delete'))}}
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span arial-hidden="true">X</span></button>
				<h4 class="modal-title">Cancelar Ingreso</h4>
		</div>
		<div class="modal-body">
			<p>Desea cancelar el ingreso al almacen?</p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary">Confirmar</button>
		</div>
		
	</div>
</div>
	{{Form::close()}}
</div>