<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validator = $request->validate([
            'cedula'     => 'required|exists:individuals,cedula',
            'password'  => 'required|min:6'
        ]);

        // Puedo buscar el individuo por su cedula, luego tratarlo de matchear con un usuario mediante individual_id

        if (Auth::attempt($validator)) {
            return redirect()->route('home');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return back();
    }
}
