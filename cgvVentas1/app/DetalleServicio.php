<?php

namespace cgvVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleServicio extends Model
{
	protected $table='detalle_servicio';
    protected $primaryKey = 'iddetalle_servicio';

    public $timestamps=false;

    protected $fillable = [
    	'idservicio',
    	'idarticulo',
    	'cantidad',
    	'precio_venta',
    	'descuento'
    ];

    protected $guarded =[
    ];  
}
