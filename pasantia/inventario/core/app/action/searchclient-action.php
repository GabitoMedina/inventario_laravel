
<?php if(isset($_GET["client"]) && $_GET["client"]!=""):?>
	<?php
$clients = PersonData::getLike($_GET["client"]);
if(count($clients)>0){
	?>
<h3>Resultados de la Busqueda</h3>
<table class="table table-bordered table-hover">
	<thead>
		<th>identificacion</th>
		<th>Nombre Completo</th>
		<th>Direccion</th>
		<th>Email </th>
		<th>Telefono</th>
		<!-- <th>Cantidad</th> -->
	</thead>
	<!-- <?php
$clients_in_cero=0;
	 foreach($clients as $client):
$q= OperationData::getQYesF($client->id);
	?>
	<?php
	if($q>0):?> -->

	<tr class="<?php if($q<=$client->inventary_min){ echo "danger"; }?>">
		<td style="width:80px;"><?php echo $client->id; ?></td>
		<td><?php echo $client->name; ?></td>
		<td><?php echo $client->address1; ?></td>
		<td><b>$<?php echo $client->email1; ?></b></td>
    <td><b>$<?php echo $client->phone1; ?></b></td>
		<!-- <td>
			<?php echo $q; ?>
		</td> -->
		<td style="width:250px;"><form method="post" action="index.php?view=addtocart">
		<input type="hidden" name="client_id" value="<?php echo $client->id; ?>">

<!-- <div class="input-group">
		<input type="" class="form-control" required name="q" placeholder="Cantidad ...">
      <span class="input-group-btn">
		<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Agregar</button>
      </span>
    </div> -->


		</form></td>
	</tr>

<?php else:$clients_in_cero++;
?>
<?php  endif; ?>
	<?php endforeach;?>
</table>
<?php if($clients_in_cero>0){ echo "<p class='alert alert-warning'>Se omitieron <b>$clients_in_cero clientos</b> que no tienen existencias en el inventario. <a href='index.php?module=inventary'>Ir al Inventario</a></p>"; }?>

	<?php
}else{
	echo "<br><p class='alert alert-danger'>No se encontro el cliento</p>";
}
?>
<hr><br>
<?php else:
?>
<?php endif; ?>
