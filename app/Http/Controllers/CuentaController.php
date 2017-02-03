<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
use App\Galpon;
use App\Silos;
use App\Http\Requests;
use App\Http\Requests\ConsumoRequest;
use Session;
use Redirect;
use DB;

class CuentaController extends Controller {


    public function __construct(Request $request) {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('auth', ['only' => 'admin']);
    }
    function index(Request $request) {
         $id_empresa=DB::select("select id_empresa from  users where id=".$request->user()->id);
//       $resultado=Cuenta::name($request->cuenta);
//       $resultado=Cuenta::lists();
           $cuenta= DB::select("select*from cuenta");
         $id_padre=DB::select("select nombre,id from  cuenta");
        if ($request->cuenta=="") {
            $resultado=DB::select('select cuenta.estado, cuenta.nombre as nombre_cuenta,cuenta.id as id_cuenta, cuenta.id_padre, cuenta.hijo,cuenta.utilizable,cuenta.codigo, empresa.nombre '
                . 'from cuenta,empresa where cuenta.id_empresa=empresa.id and cuenta.id_empresa='.$id_empresa[0]->id_empresa);
        }
        else{
        $resultado=DB::select('select cuenta.estado, cuenta.nombre as nombre_cuenta,cuenta.id as id_cuenta, cuenta.id_padre, cuenta.hijo,cuenta.utilizable,cuenta.codigo, empresa.nombre '
        . 'from cuenta,empresa where cuenta.id_empresa=empresa.id and cuenta.nombre="'.$request->cuenta.'" and cuenta.id_empresa='.$id_empresa[0]->id_empresa);}
//       
       
                return view('cuenta.lista_cuentas',  compact('resultado','id_padre','cuenta'));

    }

    public function create() {
        $galpon = Galpon::lists('nombre', 'id');
        $silos = Silos::lists('nombre', 'id');
        return view('consumo.create', compact('galpon', $galpon, 'silos', $silos));
        $cant = DB::table('silo')->where('id', '1');
        echo $cant->id;
        echo "$consumo";
    }

    public function store(Request $request) {
        try {
                    $resultado=DB::select("select id_empresa from  users where id=".$request->user()->id);

           DB::beginTransaction();
           
             Cuenta::create([
                 'id_empresa'=>$resultado[0]->id_empresa,
                 'codigo'=>$request->codigo,
                 'id_padre'=>$request->id_padre,
                 'hijo'=>$request->hijo,
                 'nombre'=>$request->nombre,
                 'utilizable'=>$request->utilizable,
                 'estado'=>$request->estado,
                 
                 ]);
              DB::commit();
                 Session::flash('message','GUARDADO CORRECTAMENTE');
        return Redirect::to('/cuenta');
        } catch (Exception $exc) {
             DB::rollback();
            echo $exc->getTraceAsString();
        }

    
      
    }

    public function edit($id) {
        $consumo = Consumo::find($id);
        $galpon = Galpon::lists('nombre', 'id');
        $silos = Silos::lists('nombre', 'id');
        return view('consumo.edit', compact('galpon', $galpon, 'silos', $silos), ['consumo' => $consumo]);
    }

    public function update($id, ConsumoRequest $request) {
        $consumo = Consumo::find($id);
        $consumo->fill($request->all());
        $consumo->save();
        Session::flash('message', 'Consumo Actualizado Correctamente');
        return Redirect::to('/consumo');
    }

    public function destroy($id) {
        $consumo = Consumo::find($id);
        $consumo->delete();
        Consumo::destroy($id);
        Session::flash('message', 'Consumo Eliminado Correctamente');
        return Redirect::to('/consumo');
    }
     public function  plan_cuenta(){
     $cuenta= DB::select("select*from cuenta");
 $id_padre=DB::select("select nombre,id from  cuenta");

        return view('cuenta.index', compact('cuenta','id_padre',$id_padre));
       
    }
  
    
}
