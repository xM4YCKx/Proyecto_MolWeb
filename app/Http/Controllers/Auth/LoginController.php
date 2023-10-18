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

        $remember = $request->filled('remember');

        $user = User::where('nombre_usuario', $request->usuario)->first();

        if($user->contrasena === md5($request->password)){

            Auth::login($user);
            $request->session()->regenerate();

            return $redirect->intended('conductor')->with('');
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
