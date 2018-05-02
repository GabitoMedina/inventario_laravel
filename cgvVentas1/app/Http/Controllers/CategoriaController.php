<?php

namespace cgvVentas\Http\Controllers;

use Illuminate\Http\Request;

use cgvVentas\Http\Requests;
use cgvVentas\Categoria;
USE Illuminate\Support\Facades\Redirect;
use cgvVentas\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{
    //
    public function __construct()
    {
		$this->middleware('auth');	
    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('idcategoria','desc')
    		->paginate(7);
    		return view('cgv.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);    	}
    }
    public function create()
    {
    	return view("cgv.categoria.create");
    }
    public function store(CategoriaFormRequest $request)
    {
    	$categoria=new Categoria;
    	$categoria->nombre=$request->get('nombre');
    	$categoria->descripcion=$request->get('descripcion');
    	$categoria->condicion='1';
    	$categoria->save();
    	return Redirect::to('cgv/categoria');
    }
    public function show($id)
    {
    	return view("cgv.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function edit($id)
    {
    	return view("cgv.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function update(CategoriaFormRequest $request,$id)
    {
    	$categoria=Categoria::findOrFail($id);
    	$categoria->nombre=$request->get('nombre');
    	$categoria->descripcion=$request->get('descripcion');
    	$categoria->update();
    	return Redirect::to('cgv/categoria');
    }
    public function destroy($id)
    {
    	$categoria=Categoria::findOrFail($id);
    	$categoria->condicion='0';
    	$categoria->update();
    	return Redirect::to('cgv/categoria');
    }
}
