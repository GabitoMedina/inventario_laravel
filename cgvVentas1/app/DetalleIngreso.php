<?php

namespace cgvVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $table='detalle_ingreso';
    protected $primaryKey = 'iddetalle_ingreso';

    public $timestamps=false;

    protected $fillable = [
    	'idingreso',
    	'idarticulo',
    	'cantidad',
        'num_serie',
    	'precio_compra',
    	'precio_venta'];
        protected $guarded =[
        ];
}
