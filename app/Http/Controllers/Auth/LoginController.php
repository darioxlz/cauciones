<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Individual;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            'cedula'     => 'required|integer|exists:individuals,cedula',
            'password'  => 'required|min:6'
        ]);

        // Puedo buscar el individuo por su cedula, luego tratarlo de matchear con un usuario mediante individual_id

        $individual = Individual::where('cedula', '=', $validator['cedula'])->first();
        $user = User::firstWhere('individual_id', '=', $individual->individual_id);


        if (Auth::attempt(array('user_id' => $user->user_id, 'password' => $request->get('password')))) {
            session(['individual' => $individual->toArray()]);

            return redirect()->route('home');
        } else {
            return back()->withErrors([
                'password' => 'Clave invalida'
            ]);
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return back();
    }
}
