<?php

namespace cgvVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleProforma extends Model
{
    protected $table='detalle_proforma';
    protected $primaryKey = 'iddetalle_proforma';

    public $timestamps=false;

    protected $fillable = [
    	'idproforma',
    	'idarticulo',
    	'cantidad',
    	'precio_venta',
    	'descuento'];
    	protected $guarded =[]  ;
}
