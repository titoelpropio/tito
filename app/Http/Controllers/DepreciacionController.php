<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Depreciacion;
use App\Http\Requests;
use Session;
use Redirect;
use App\Helpers;
use App\Cuenta;
use DB;

class DepreciacionController extends Controller {

    public function __construct(Request $request) {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('auth', ['only' => 'admin']);
    }

    function index(Request $request) {
        $id_empresa = DB::select("SELECT empresa.id,nombre FROM empresa, users WHERE users.id_empresa=empresa.id and users.id=" . $request->user()->id);
        $depreciacion = DB::SELECT('SELECT cuenta.nombre,depreciacion.id,vida_util,depreciacion_anual from depreciacion,cuenta where depreciacion.id_cuenta=cuenta.id ');
        $cuenta = Cuenta::where(['id_empresa' => $id_empresa[0]->id, 'utilizable' => 1])->get();
        return view('depreciacion.index', compact('depreciacion', 'cuenta'));
    }

    public function create() {
        return view('depreciacion.create');
    }

    public function store(Request $request) {
//        $tree = new arbol;
//        if(!arbol::validar("texto y entero",$request['nombre'])){
//        }
        Depreciacion::create([
            'id_cuenta' => $request['id_cuenta'],
            'vida_util' => $request['vida_util'],
            'depreciacion_anual' => $request['depreciacion_anual'],
        ]);
        Session::flash('message', 'Depreciacion Creada Correctamente');
        return Redirect::to('/depreciacion');
    }

    public function edit($id) {
        $cuenta = Cuenta::all();
        $depreciacion = Depreciacion::find($id);
        return view('depreciacion.edit', ['depreciacion' => $depreciacion, 'cuenta' => $cuenta]);
    }

    public function update($id, Request $request) {
        $depreciacion = Depreciacion::find($id);
        $depreciacion->fill($request->all());
        $depreciacion->save();
        Session::flash('message', 'Usuario Actualizado Correctamente');
        return Redirect::to('/depreciacion');
    }

    public function destroy($id, Request $request) {
        $depreciacion = Depreciacion::find($id);
        $depreciacion->delete();
        Session::flash('message', 'depreciacion Eliminado Correctamente');
        return Redirect::to('/depreciacion');
    }

}
