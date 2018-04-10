<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
  <?php include 'headerproform.php';?>


<hr style="border-color:black;">
<?php include 'cabeceraproform.php';?>

<hr style="border-color:black;">
<form save action="servidor/sProforma.php" role="proforma">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="" class="control-label">N° Proforma</label>
                <input name="codigo" type="text" class="form-control" readonly value="0">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="" class="control-label">Fecha</label>
                <input tipo="fecha" fecha name="fecha" type="text" class="form-control" readonly required>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="" class="control-label">Cliente</label>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="button" data-toggle="modal" data-target="#modal-find-cliente" class="btn btn-primary"><i class="fa fa-search"></i> </button>
                            <button type="button" class="btn btn-success" data-url="MVC/View/Client/cliente.php" data-toggle="modal" data-target="#modal-new2"><i class="fa fa-plus"></i> </button>
                        </div>
                        <input type="text" nombres class="form-control" style="width: 70%;" readonly>
                        <input type="text" class="hidden" name="IdCliente" required>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="" class="control-label">$ Valor Envio</label>
                <input tipo="decimal" myDecimal name="envio" type="text" class="form-control" value="0">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="" class="control-label">Garantia</label>
                <div tipo data-fn="loadGarantia" class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="button" class="btn btn-primary" data-url="MVC/View/Catalog/garantia.php" data-toggle="modal" data-target="#modal-new2"><i class="fa fa-plus"></i> </button>
                            <button type="button" refresh class="btn btn-success"><i class="fa fa-refresh"></i> </button>
                        </div>
                        <select name="idgarantia" class="selectpicker form-control" data-width="70%"></select>
                    </div>
                </div>

            </div>
        </div>
    </div> -->

    <div class="row">
        <div toolbar id="toolbarDetalle" class="btn-group">
            <!--<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-new" data-tab="#detalleProforma">-->
            <button addTable type="button" class="btn btn-success">
                <i class="fa fa-plus"></i> Agregar
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-find">
                <i class="fa fa-search"></i> Producto
            </button>
            <button type="button" delete_local class="btn btn-danger">
                <i class="fa fa-trash"></i> Eliminar
            </button>
        </div>
        <br>
        <div class="row">

          <div class="col-md-12">
              <table
                  id="detalleProforma"
                  data-toolbar="#toolbarDetalle"
                  data-use-row-attr-func="true"
                  data-reorderable-rows="true"

                  detalle>
                  <thead>
                      <tr>
                          <!-- <th data-field="state" data-checkbox="true"></th> -->
                          <th data-formatter="rowCount">N°</th>
                          <th data-field="producto" data-formatter="defaultDescripcion" data-events="event_imask" > Detalle Producto</th>
                          <th data-field="cantidad" class="col-md-1" data-formatter="imask" data-events="event_imask" >Cantidad</th>
                          <!--<th data-field="precioProveedor" class="col-md-2"  >$ Proveedor</th>-->
                          <th data-field="precioProveedor" class="col-md-1" data-formatter="imask" data-events="event_imask">Precio Unitario</th>
                          <th data-field="precioComision" class="col-md-1" data-formatter="imask" data-events="event_imask" >Precio Total</th>
                          <!--<th data-field="accion" class="col-md-1" data-align="center" data-formatter="defaultAccion" data-events="editAccion" >Accion</th>-->
                      </tr>
                  </thead>
              </table>
          </div>

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



</body>

</html>
