<?php
$categories = CategoryData::getAll();
?>

<div class="row">

  <form save id="addproduct" action="index.php?view=addproform" role="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label">Tipo Identificación</label>
                        <select name="tipoidentificacion" class="form-control selectpicker" required>
                            <option value="1">Cedúla</option>
                            <option value="2">RUC</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Identificación</label>
                        <input name="identificacion" type="text" class="form-control" maxlength="13" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Nombres</label>
                        <input name="nombres" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Teléfono</label>
                                <input name="telefono" type="text" class="form-control" maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Celular</label>
                                <input name="celular" type="text" class="form-control" maxlength="10">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input name="email" type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Dirección</label>
                        <textarea name="direccion" cols="30" class="form-control" rows="2"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button type="reset" class="btn btn-danger">
                            <i class="fa fa-reply"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Guardar
                        </button>
                    </div>
                </div>
            </div>
        </form>

</div>

<!-- <div class="row">
  <div class="col-md-12">

    <table
        id="detalleProforma"
        data-toolbar="#toolbarDetalle"
        data-use-row-attr-func="true"
        data-reorderable-rows="true"

        detalle>
        <thead>
            <tr>
                <th data-field="state" data-checkbox="true"></th>
                <th data-formatter="rowCount">N°</th>
                <th data-field="producto" data-formatter="defaultDescripcion" data-events="event_imask" >Producto</th>
                <th data-field="cantidad" class="col-md-1" data-formatter="imask" data-events="event_imask" >Cantidad</th>
                <!--<th data-field="precioProveedor" class="col-md-2"  >$ Proveedor</th>-->
                <th data-field="precioProveedor" class="col-md-1" data-formatter="imask" data-events="event_imask">$ Proveedor</th>
                <th data-field="precioComision" class="col-md-1" data-formatter="imask" data-events="event_imask" >$ Comisión</th>
                <!--<th data-field="accion" class="col-md-1" data-align="center" data-formatter="defaultAccion" data-events="editAccion" >Accion</th>-->
            </tr>
        </thead>
    </table>
</div>
</div>
<br>
<div class="row">
<div class="col-md-12">
    <div class="pull-right" style="display: flex; align-items: flex-end;flex-direction: column;">
        <div class="form-inline">
            <label class="control-label">Subtotal</label>
            <input id="txtSubtotal" readonly type="text" class="form-control input-sm" style="text-align: right;">
        </div>
        <div class="form-inline">
            <label class="control-label">Valor Comisión</label>
            <input tipo="decimal" myDecimal type="text" name='ganancia' class="form-control input-sm" style="text-align: right;">
        </div>
        <div class="form-inline">
            <label class="control-label">Total Comisión</label>
            <input id="txtComision" readonly type="text" class="form-control input-sm" style="text-align: right;">
        </div>
        <div class="form-inline">
            <label class="control-label">Total</label>
            <input id="txtTotal" readonly type="text" class="form-control input-sm" style="text-align: right;">
        </div>
    </div>
    <div class="pull-left">
<!--                        <button type="button" id="ActualizarValores" class="btn btn-success"><i class="fa fa-refresh"></i> Refrescar</button>-->
        <label id="contadorRegistro" class="control-label">Registros: 0</label>
    </div>
</div>
</div>
<br>
<div class="row">
<div class="col-md-12">
    <div class="pull-right">
        <button type="reset" class="btn btn-danger">
            <i class="fa fa-reply"></i> Cancelar
        </button>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Guardar
        </button>
        <button type="button" id="ActualizarValores" class="btn btn-success">
            <i class="fa fa-refresh"></i> Refrescar
        </button>
    </div>
</div>
</div>
</form>
</div>

<div id="modal-new" class="modal fade"   >
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        Nuevo Items
    </h4>
</div>
<div class="modal-body">
    <form local data-tb="#detalleProforma" action="action">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Producto</label>
                    <input name="producto" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Cantidad</label>
                    <input name="cantidad" type="text" class="form-control" required myDecimal style="text-align: right;" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">$ Proveedor</label>
                    <input name="precioProveedor" type="text" class="form-control" required myDecimal style="text-align: right;">
                </div>
                <div class="form-group">
                  <label for="" class="control-label">$ Comisión</label>
                  <input name="precioComision" type="text" class="form-control" required myDecimal style="text-align: right;">
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <div class="pull-right">
                  <button type="reset" class="btn btn-danger"> <i class="fa fa-reply"></i> Cancelar</button>
                  <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Añadir </button>
              </div>
          </div>
      </div>
  </form>


</div>
</div>
</div>
</div>

<div id="modal-find" class="modal fade"   >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">
      <i class="fa fa-search" aria-hidden="true"></i>
      Buscar Items
  </h4>
</div>
<div class="modal-body">
  <table
      find
      data-ajax="loadProducto"
      >
      <thead>
          <tr>
              <th data-field="descripcion">Descripcion</th>
              <th data-formatter="AccSeleccion" data-events="event_find" class="col-md-1" data-align="center">Acción</th>
          </tr>
      </thead>
  </table>

  </div>

</div> -->
