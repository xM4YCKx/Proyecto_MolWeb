<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request, Redirector $redirect){

        $validacion = $request->validate([
            'usuario' => 'required',
            'password' => 'required'
        ]);

        $remember = $request->filled('remember');

        $user = User::where('nombre_usuario', $request->usuario)->first();

        if($user == null ){
            $error_u = 'usuario no existe';
            return view('login')->with('<div class="alert alert-danger">'.$error_u.'</div>');
        }
        if($user->contrasena === md5($request->password)){

            Auth::login($user);
            $request->session()->regenerate();
            $request->session()->put('id_trabajador', $user['id_trabajador']);

            if($user->cargo === 'conductor'){
                return $redirect->intended('conductor')->with('');
            }elseif ($user->cargo === 'supervisor'){
                return $redirect->intended('supervisor')->with('');
            }elseif ($user->cargo === 'planificador'){
                return $redirect->intended('planificador')->with('');
            }elseif ($user->cargo === 'mecanico'){
                return $redirect->intended('mecanico')->with('');
            }elseif ($user->cargo === 'administrador'){
                return $redirect->intended('administrador')->with('');
            }
        }

        throw ValidationException::withMessages([
            'usuario' => __('auth.failed')
        ]);
    }

    public function logout(Request $request, Redirector $redirect){

        Auth::logout();

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        return $redirect ->to('/');
    } 
}
