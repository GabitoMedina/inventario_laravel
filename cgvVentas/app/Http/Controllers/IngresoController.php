<?php

namespace cgvVentas\Http\Controllers;

use Illuminate\Http\Request;

use cgvVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use cgvVentas\Http\Requests\IngresoFormRequest;
use cgvVentas\Ingreso;
use cgvVentas\DetalleIngreso;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class IngresoController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query=trim($request->get('searchtext'));
    		$ingresos=DB::table('ingreso as i')
    		->join('persona as p','i.idproveedor','=','p.idpersona')
    		->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
    		->select('i.idingreso','i.fecha','p.nombre','i.tipo_comprobante','i.num_comprobante','i.iva','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total')) 
    		->where('i.num_comprobante','LIKE','%'.$query.'%')
    		->orderBy('i.idingreso','desc')
    		->groupBy('i.idingreso','i.fecha','p.nombre','i.tipo_comprobante','i.num_comprobante','i.iva','i.estado')
    		->paginate(7);
    		return view('compras.ingreso,index',['ingresos'=>$ingresos,"searchtext"=>$query]);
   		 }
    }
    public function create()
    {
    	$personas=DB::table('persona')->where('tipo_persona','=','Proveedor')->get();
    	$articulos = DB::table('articulo as art')
    	->select(DB::raw('CONCAT(art.codigo, " ",art.nombre) AS articulo'),'art.idarticulo')
    	->where('art.estado','=','Activo')
    	->get();
    	return view("compras.ingreso.create",["personas"=>$personas,"articulos"=>$articulos]);
    }
}
