<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index() {
        $users = Usuario::all();
        return view('usuarios.index', [
            'users' => $users,
        ]);
    }

    public function add(Request $request) {
        if ($request->isMethod('POST')) {
            $usr = $request->validate([
                'name' => 'string|required',
                'email' => 'email|required',
                'password' => 'string|required',
            ]);

            $usr['password'] = Hash::make($usr['password']);

            $user = Usuario::create($usr);
            // lança um evento Registered que vai enviar um e-mail
            event(new Registered($user));


            return redirect()->route('usuarios');
        }

        return view('usuarios.add');
    }

    public function login(Request $request){
        if($request->isMethod('POST')){
            $data = $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            if(Auth::attempt($data)){
                return redirect()->intended('home');
            } else{
                return redirect()->route('login')->with('erro', 'Deu ruim!');
            }
        }


        return view('usuarios.login');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('home');
    }
}
