<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gestion;
use Session;
use Redirect;
use App\Http\Requests;
use DB;

class GestionController extends Controller {

    public function __construct(Request $request) {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('auth', ['only' => 'admin']);
    }

    function index() {
        $gestion = Gestion::paginate(9);
        return view('gestion.index', compact('gestion'));
    }

    public function create() {
        return view('gestion.create');
    }

    public function store(Request $request) {
//        $tree = new arbol;
//        if(!arbol::validar("texto y entero",$request['nombre'])){
//            
//        }
        $resultado=DB::select('select count(*) as count from gestion where estado=1');
        if ($resultado[0]->count==0) {
             Gestion::create([
            'fecha_inicio' => $request['fecha_inicio'],
            'nombre_gestion' => $request['nombre_gestion'],
            'estado' => 1,
        ]);
        Session::flash('message', 'Gestion Creado Correctamente');
        return Redirect::to('/gestion');
        }
        else{
             Session::flash('message-error', 'YA EXISTE UNA GESTION ACTIVA POR FAVOR DESACTIVE');
        return Redirect::to('/gestion');
        }
       
    }

    public function edit($id) {

        $gestion = Gestion::find($id);
        return view('gestion.edit', ['gestion' => $gestion]);
    }

    public function update($id, GestionRequest $request) {
        
        $gestion = Gestion::find($id);
        $gestion->fill($request->all());
        $gestion->save();
        Session::flash('message', 'Empresa Actualizado Correctamente');
        return Redirect::to('/gestion');
    }

    public function destroy($id, Request $request) {

        $gestion = Gestion::find($id);
        $gestion->delete();
        Session::flash('message', 'gestion Eliminado Correctamente');
        return Redirect::to('/gestion');
    }

    public function desactivar_gestion($id,$numero,Request $request) {
        $fecha_actual=date("Y") . "-" . date("m") . "-" . date("d");
     
        if ($request->ajax() && $numero==0) {
            $gestion = Gestion::find($id);
            $gestion->fill([
                'estado' => 0,
                'fecha_fin' => $fecha_actual,
            ]);
            $gestion->save();
            return response()->json(["mensaje"=>"holi"]);
        }else{
            $gestion = Gestion::find($id);
            $gestion->fill([
                'estado' => 1,
                'fecha_fin' => 'null',
            ]);
            $gestion->save();
            return response()->json(["mensaje"=>"holi"]);
        }
        
    }

}
