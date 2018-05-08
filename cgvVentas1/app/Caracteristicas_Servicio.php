<?php

namespace cgvVentas;

use Illuminate\Database\Eloquent\Model;

class Caracteristicas_Servicio extends Model
{
    protected $table='caracteristicas_servicio';
    protected $primaryKey = 'idcaracteristicas';

    public $timestamps=false;

    protected $fillable = [
    	'nombre_caracteristicas',
    	'marca',
    	'modelo',
        'serie',
        'cargador',
        'bateria',
        'observacion'
    ];

    protected $guarded =[
    ]; 
}
