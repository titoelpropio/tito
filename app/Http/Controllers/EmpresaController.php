<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;


use App\Http\Requests;
use App\Http\Requests\EmpresaRequest;
use Session;
use Redirect;
use App\Helpers;

   
class EmpresaController extends Controller
{
     public function __construct(Request $request) {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('auth', ['only' => 'admin']);
    
}
	function index(){
        $empresa=Empresa::paginate(9);
       return view('empresa.index',compact('empresa'));
	}
  
  
	public function create(){
      return view('empresa.create');	
    }
    
    public function store(EmpresaRequest $request){
//        $tree = new arbol;
//        if(!arbol::validar("texto y entero",$request['nombre'])){
//            
//        }
    	Empresa::create([
            'nombre' => $request['nombre'],
            'direccion' => $request['direccion'],
            'telefono' => $request['telefono'],
            'correo' => $request['correo'],
            
        ]);
        Session::flash('message','Empresa Creado Correctamente');
        return Redirect::to('/empresa');
    }

    public function edit($id){
    		
   $empresa = Empresa::find($id);
   return view('empresa.edit',['empresa'=>$empresa]);
    }

public function update($id, EmpresaRequest $request){
        $user =Empresa::find($id);
        $user->fill($request->all());
        $user->save();
        Session::flash('message','Usuario Actualizado Correctamente');
        return Redirect::to('/empresa');

    }
    
    public function destroy($id, Request $request){

        $empresa=Empresa::find($id);
        $empresa->delete();
        Session::flash('message','empresa Eliminado Correctamente');
       return Redirect::to('/empresa');
    }
    

}
