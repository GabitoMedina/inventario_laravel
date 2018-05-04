<?php

namespace cgvVentas;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table='servicio';
    protected $primaryKey = "idservicio";

    public $timestamps=false;

    protected $fillable = [
    	'idcliente',
    	'tipo_comprobante',
    	'num_comrobante',
    	'fecha',
    	'iva',
    	'total_servicio', 
    	'estado'];
    	protected $guarded =[]  ;
}
