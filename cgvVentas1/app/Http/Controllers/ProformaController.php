<?php

namespace cgvVentas\Http\Controllers;

use Illuminate\Http\Request;

use cgvVentas\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use cgvVentas\Http\Request\ProformaFormRequest;
use cgvVentas\Proforma;
use cgvVentas\DetalleProforma;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class ProformaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $proformas=DB::table('proforma as prof')
            ->join('persona as p','prof.idcliente','=','p.idpersona')
            ->join('detalle_proforma as dp','prof.idproforma','=','dp.idproforma')
            ->select('prof.idproforma','prof.fecha','p.nombre','prof.tipo_comprobante','prof.num_comprobante','prof.iva','prof.estado',DB::raw('sum(dp.cantidad*precio_venta) as total')) 
            ->where('prof.num_comprobante','LIKE','%'.$query.'%')
            ->orderBy('prof.idproforma','desc')
            ->groupBy('prof.idproforma','prof.fecha','p.nombre','prof.tipo_comprobante','prof.num_comprobante','prof.iva','prof.estado')
            ->paginate(7);
            return view('proformas.index',["proformas"=>$proformas,"searchText"=>$query]);
         }
    }
    public function create()
    {
        $personas=DB::table('persona')->where('tipo_persona','=','Cliente')->get();
        $articulos = DB::table('articulo as art')
        ->join('detalle_proforma as dp','art.idarticulo','=','dp.idarticulo')
        ->select(DB::raw('CONCAT(art.codigo, " ",art.nombre) AS articulo'),'art.idarticulo','art.stock',DB::raw('avg(dp.precio_venta) as precio_promedio'))
        ->where('art.estado','=','Activo')
        ->where('art.stock','>','0')
        ->groupBy('articulo','art.idarticulo','art.stock')
        ->get();
        return view("proformas.create",["personas"=>$personas,"articulos"=>$articulos]);
    }

     public function store (ProformaFormRequest $request)
    {
        try{
            DB::beginTransaction();
            $proforma=new Proforma;
            $proforma->idcliente=$request->get('idcliente');
            $proforma->tipo_comprobante=$request->get('tipo_comprobante');
            $proforma->num_comprobante=$request->get('num_comprobante');
            $proforma->total_venta=$request->get('total_venta');

            $mytime= Carbon::now('America/Guayaquil');
            $proforma->fecha=$mytime->toDateTimeString();
            $proforma->iva='12';
            $proforma->estado='Activo';
            $proforma->save();
 
            $idarticulo= $request->get('idarticulo');
            $cantidad = $request->get('cantidad');
            $descuento = $request->get('descuento');
            $precio_venta = $request->get('precio_venta');
             
            $cont = 0;
            while($cont < count($idarticulo)){
                $detalle = new DetalleProforma();
                $detalle->idproforma=$proforma->idproforma;
                $detalle->idarticulo= $idarticulo[$cont]; 
                $detalle->cantidad= $cantidad[$cont];
                $detalle->descuento= $descuento[$cont];
                $detalle->precio_venta= $precio_venta[$cont];
                $detalle->save();
                $cont=$cont+1;
            }
            DB::commit();
        }catch(\Exception $e)
        {
            DB::rollback();
        }
        return Redirect::to('proformas');
    }

    public function show($id)
    {
        $proforma=DB::table('proforma as prof')
            ->join('persona as p','prof.idcliente','=','p.idpersona')
            ->join('detalle_proforma as dp','prof.idproforma','=','dp.idproforma')
            ->select('prof.idproforma','prof.fecha','p.nombre','prof.tipo_comprobante','prof.num_comprobante','prof.iva','prof.estado','prof.total_venta') 
            ->where('prof.idproforma','=',$id)
            ->first();

        $detalles=DB::table('detalle_proforma as d')
            ->join('articulo as a','d.idarticulo','=','a.idarticulo')
            ->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta')
            ->where('d.idproforma','=',$id)
            ->get();
        return view("proformas.show",["proforma"=>$proforma,"detalles"=>$detalles]);
    }
 
    public function destroy($id)
    {
        $proforma=Proforma::findOrFail($id);
        $proforma->estado='Cancelada';
        $proforma->update();
        return Redirect::to('proformas');
    }
}
