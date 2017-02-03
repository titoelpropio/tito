<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoriaRequest;
use App\Categoria;
use DB;
class CategoriaController extends Controller
{

    public function __construct(Request $request) {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('auth', ['only' => 'admin']);
    }
function index(){
     $categoria=Categoria::paginate(10);
     return view('categoria.index',compact('categoria'));
	}
  
	public function create(){
    return view('categoria.create');		
  }

  public function store(CategoriaRequest $request){
        Categoria::create([
          'nombre' => $request['nombre']]);
        return redirect('/categoria')->with('message','Guardado Correctamente');  
  }

  public function update(CategoriaRequest $request,$id){
    $categoria= Categoria::find($id);
    $categoria->fill($request->all());
    $categoria->save();
    return redirect('/categoria')->with('message','Modificado Correctamente');  
  }

  public function edit($id){
      $categoria=Categoria::find($id);
      return view('categoria.edit',['categoria'=>$categoria]);
  }
  public function listacategoria(Request $request ){
      if ($request->ajax()){
      $categoria=DB::select('select *from categoria');
      return response()->json($categoria);
      
      
      }
  }

  public function destroy($id){
    /*  $edad=Edad::find($id);
      $edad->delete();
      Session::flash('message','Edad Eliminado Correctamente');
     return Redirect::to('/edad');*/
  }
}
