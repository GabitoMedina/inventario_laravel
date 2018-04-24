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
            $proformas=DB::table('proforma as prf')
            ->join('persona as p','prf.idcliente','=','p.idpersona')
            ->join('detalle_proforma as dprf','prf.idproforma','=','dprf.idproforma')
            ->select('prf.idproforma','prf.fecha','p.nombre','prf.tipo_comprobante','prf.num_comprobante','prf.iva','prf.estado','prf.total_proforma') 
            ->where('prf.num_comprobante','LIKE','%'.$query.'%')
            ->orderBy('prf.idproforma','desc')
            ->groupBy('prf.idproforma','prf.fecha','p.nombre','prf.tipo_comprobante','prf.num_comprobante','prf.iva','prf.estado')
            ->paginate(7);
            return view('proformas.index',["proformas"=>$proformas,"searchText"=>$query]);
         }
    }
    public function create()
    {
        $personas=DB::table('persona')->where('tipo_persona','=','Cliente')->get();
        $articulos = DB::table('articulo as art')
        ->join('detalle_proforma as di','art.articulo','=','di.idarticulo')
        ->select(DB::raw('CONCAT(art.codigo, " ",art.nombre) AS articulo'),'art.idarticulo','art.stock',DB::raw('avg(di.precio_venta) as precio_promedio'))
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
            $proforma->total_proforma=$request->get('total_proforma');

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
        $proforma=DB::table('proforma as prf')
            ->join('persona as p','prf.idproveedor','=','p.idpersona')
            ->join('detalle_proforma as dprf','prf.idproforma','=','dprf.idprf')
            ->select('prf.idproforma','prf.fecha','p.nombre','prf.tipo_comprobante','prf.num_comprobante','prf.iva','prf.estado','prf.total_proforma') 
            ->where('prf.idproforma','=',$id)
            ->first();

        $detalles=DB::table('detalle_proforma as d')
        ->join('articulo as a','d.idarticulo','=','a.idarticulo')
        // ->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta')
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
