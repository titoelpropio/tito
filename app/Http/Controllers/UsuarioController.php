<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Session;
use Redirect;
use App\Empresa;
use DB;
use Hash;

class UsuarioController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('auth', ['only' => 'admin']);
    }

    function index() {
        $empresa = Empresa::lists('nombre', 'id');

        $users = User::paginate(8);
        return view('usuario.index', compact('users', $users, 'empresa'));
    }

    public function create() {
        $empresa = Empresa::lists('nombre', 'id');
        return view('usuario.create', compact('empresa'));
    }

    public function store(UserCreateRequest $request) {
        $verificar = DB::select('select count(*) count from users where users.email="' . $request->email . '"');
        if ($verificar[0]->count == 0) {
            if ($request['privilegio'] != 3) {
                DB::table('users')->insert(['name' => $request['name'], 'email' => $request['email'], 'password' => Hash::make($request['password']), 'estado' => $request['estado'], 'privilegio' => $request['privilegio'], 'id_empresa' => $request['id_empresa']]);
                //        DB:table('users')->insert(['nick'=>$request->nick,'nick'=>$request->nick,'password'=>Hash::make($request->password)]);
                Session::flash('message', 'Usuario Creado Correctamente');
                return Redirect::to('/usuario');
            } else {//registra a los usuario android con password encriptado en MD5
                DB::table('users')->insert(['name' => $request['name'], 'email' => $request['email'], 'password' => md5($request['password']), 'estado' => $request['estado'], 'privilegio' => $request['privilegio'], 'id_empresa' => $request['id_empresa']]);
                //        DB:table('users')->insert(['nick'=>$request->nick,'nick'=>$request->nick,'password'=>Hash::make($request->password)]);
                Session::flash('message', 'Usuario Creado Correctamente');
                return Redirect::to('/usuario');
            }
        } else {
            Session::flash('message-error', 'Ya existe un usuario con ese nick');
            return Redirect::to('/usuario');
        }
    }

    public function edit($id) {

        $trabajador = User::find($id);
        $empresa = Empresa::where('id', $trabajador->id_empresa)->lists('nombre', 'id');

        return view('usuario.edit', ['user' => $trabajador], compact('empresa'));
    }

    public function update($id, UserUpdateRequest $request) {
        
        $verificar = DB::select('select count(*) count from users where users.email<>"' . $request->email . '" and users.id='.$id);
        if ($verificar[0]->count == 0) {
            if ($request['privilegio'] != 3) {
               try {
            DB::beginTransaction();
            $user = User::find($id);
            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'privilegio' => $request->privilegio,
                'estado' => $request->estado,
                'password' => Hash::make($request->password),
                'id_empresa' => $request->id_empresa
            ]);
            $user->save();
            DB::commit();
            Session::flash('message', 'Usuario Actualizado Correctamente');
            return Redirect::to('/usuario');
        } catch (Exception $ex) {
            DB::rollback();
            echo $exc->getTraceAsString();
        }
            } else {//registra a los usuario android con password encriptado en MD5
                try {
            DB::beginTransaction();
            $user = User::find($id);
            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'privilegio' => $request->privilegio,
                'estado' => $request->estado,
                'password' => md5($request['password']),
                'id_empresa' => $request->id_empresa
            ]);
            $user->save();
            DB::commit();
            Session::flash('message', 'Usuario Actualizado Correctamente');
            return Redirect::to('/usuario');
        } catch (Exception $ex) {
            DB::rollback();
            echo $exc->getTraceAsString();
        }
            }
        } else {
            Session::flash('message-error', 'Ya existe un usuario con ese nick');
            return Redirect::to('/usuario');
        }
        
        
    }

    public function destroy($id) {

        $trabajador = User::find($id);
        $trabajador->delete();
        Session::flash('message', 'Usuario Eliminado Correctamente');
        return Redirect::to('/usuario');
    }

}
