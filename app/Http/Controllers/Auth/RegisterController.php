<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = $request->validate([
          'cedula'          => 'required|integer|unique:individuals,cedula',
          'firstnames'      => 'required|min:3',
          'surnames'        => 'required|min:6',
          'birthday'        => 'required|date',
          'phone_number'    => 'integer',
          'sex'             => 'required|enum:M,F',
          'city'            => 'required|exists:cities,name',
          'municipality'    => 'required|exists:municipalities,name',
          'state'           => 'required|exists:states,name'
        ]);

        $individual_data = $request->only();
        \App\User::create($validator);

        return redirect('/login');
     }
}
