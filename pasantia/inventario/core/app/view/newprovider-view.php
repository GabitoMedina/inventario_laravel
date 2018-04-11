<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Proveedor</h1>
	<br>
		<form class="form-horizontal" method="post" id="addprovider" action="index.php?view=addprovider" role="form">

			<div class="form-group">
		    <label for="inputEmail1" class="col-lg-2 control-label">Cedula o RUc*</label>
		    <div class="col-md-6">
		      <input type="text" name="identificacion" class="form-control" id="identificacion" placeholder="Nombre">
		    </div>
		  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname"  class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
	<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Empresa*</label>
    <div class="col-md-6">
      <input type="text" name="company"  class="form-control" id="company" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
    <div class="col-md-6">
      <input type="text" name="address1" class="form-control" red id="address1" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email1" class="form-control" id="email1" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
    <div class="col-md-6">
      <input type="text" name="phone1" class="form-control" id="phone1" placeholder="Telefono">
    </div>
  </div>
	<div class="form-group">
		<label for="inputEmail1" class="col-lg-2 control-label">celular*</label>
		<div class="col-md-6">
			<input type="text" name="phone2" class="form-control" id="phone2" placeholder="Telefono">
		</div>
	</div>


  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Proveedor</button>
    </div>
  </div>
</form>
	</div>
</div>
