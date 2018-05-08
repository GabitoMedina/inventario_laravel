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
    	'respaldo',
    	'idcaracteristicas',
        'fecha_entrega',
        'costo_chequeo',
        'abono',
        'saldo',
        'total_servicio'
    ];

    protected $guarded =[
    ];  
}
