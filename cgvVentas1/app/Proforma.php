<?php

namespace cgvVentas;

use Illuminate\Database\Eloquent\Model;

class Proforma extends Model
{
    protected $table='proforma';
    protected $primaryKey = 'idproforma';

    public $timestamps=false;

    protected $fillable = [
    	'idcliente',
    	'tipo_comprobante',
    	'num_comrobante',
    	'fecha',
    	'iva',
        'total',
    	'estado'
    ];
    	protected $guarded =
    ];
}
