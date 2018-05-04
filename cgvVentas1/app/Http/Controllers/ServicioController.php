<?php

namespace cgvVentas\Http\Controllers;

use Illuminate\Http\Request;

use cgvVentas\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use cgvVentas\Http\Requests\ServicioFormRequest;
use cgvVentas\Servicio;
use cgvVentas\DetalleServicio;
use DB;
use Carbon\Carbon;
use Reponse;
use Illuminate\Support\Collection;

class ServicioController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $servicios=DB::table('servicio as s')
            ->join('persona as p','s.idcliente','=','p.idpersona')
            ->join('detalle_servicio as ds','s.idservicio','=','ds.idservicio')
            ->select('s.idservicio','s.fecha','p.nombre','s.tipo_comprobante','s.num_comprobante','s.iva','s.estado','s.total_venta')
            ->where('s.num_comprobante','LIKE','%'.$query.'%')
            ->orderBy('s.idservicio','desc')
            ->groupBy('s.idservicio','s.fecha','p.nombre','s.tipo_comprobante','s.num_comprobante','s.iva','s.estado')
            ->paginate(7);
            return view('servicios.index',["servicios"=>$servicios,"searchText"=>$query]);
         }
    }
    public function create()
    {
        $personas=DB::table('persona')->where('tipo_persona','=','Cliente')->get();
        $articulos = DB::table('articulo as art')
        ->join('detalle_servicio as ds','art.idarticulo','=','dv.idarticulo')
        ->select(DB::raw('CONCAT(art.idarticulo, " ",art.nombre) AS articulo'),'art.idarticulo','art.stock',DB::raw('avg(dv.precio_venta)as precio_promedio'))
        ->where('art.estado','=','Activo')
        ->where('art.stock','>','0')
        ->groupBy('articulo','art.idarticulo','art.stock')
        ->get();
        return view("ventas.venta.create",["personas"=>$personas,"articulos"=>$articulos]);
    }

     public function store (VentaFormRequest $request)
    {
        try{ 
            DB::beginTransaction();
            $venta=new Venta;
            $venta->idcliente=$request->get('idcliente');
            $venta->tipo_comprobante=$request->get('tipo_comprobante');
            $venta->num_comprobante=$request->get('num_comprobante');
            $venta->total_venta=$request->get('total_venta');

            $mytime= Carbon::now('America/Guayaquil');
            $venta->fecha=$mytime->toDateTimeString();
            $venta->iva='0.12';
            $venta->estado='Activo';
            $venta->save();
 
            $idarticulo= $request->get('idarticulo');
            $cantidad = $request->get('cantidad');
            $descuento = $request->get('descuento');
            $precio_venta = $request->get('precio_venta');
             
            $cont = 0;
            while($cont < count($idarticulo)){
                $detalle = new DetalleVenta();
                $detalle->idventa=$venta->idventa;
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
        return Redirect::to('ventas/venta');
    }

    public function show($id)
    {
        $venta=DB::table('venta as v')
            ->join('persona as p','v.idcliente','=','p.idpersona')
            ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
            ->select('v.idventa','v.fecha','p.nombre','v.tipo_comprobante','v.num_comprobante','v.iva','v.estado','v.total_venta')
            ->where('v.idventa','=',$id)
            ->first();

        $detalles=DB::table('detalle_venta as d')
        ->join('articulo as a','d.idarticulo','=','a.idarticulo')
        ->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta')
        ->where('d.idventa','=',$id)
        ->get();
        return view("ventas.venta.show",["venta"=>$venta,"detalles"=>$detalles]);
    }
 
    public function destroy($id)
    {
        $venta=VEnta::findOrFail($id);
        $venta->estado='Cancelada';
        $venta->update();
        return Redirect::to('ventas/venta');
    }
    
}
