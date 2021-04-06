<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Individual;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function show()
    {
        $states = DB::table('states')->get()->toArray();
        $municipalities = DB::table('municipalities')->get()->toArray();
        $cities = DB::table('cities')->get()->toArray();

        return view('auth.register')->with(compact('states', 'municipalities', 'cities'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cedula' => 'required|integer|unique:individuals,cedula',
            'firstnames' => 'required|min:3',
            'surnames' => 'required|min:3',
            'birthday' => 'required|date',
            'phone_number' => 'nullable|integer',
            'sex' => 'required|in:M,F',
            'city_id' => 'required|exists:cities,city_id',
            'municipality' => 'required|exists:municipalities,municipality_id',
            'state' => 'required|exists:states,state_id',
            'address_exact' => 'nullable',
            'password' => 'nullable|min:8'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $address_data = $request->only(['city_id', 'address_exact']);
        $address = Address::create($address_data);


        $individual_data = $request->only(['cedula', 'firstnames', 'surnames', 'birthday', 'phone_number', 'sex']);
        $individual = Individual::create(array_merge($individual_data, array('address_id' => $address->address_id, 'created_at' => date('Y-m-d'))));


        if ($request->has('password')) {
            $user_data = $request->only(['password']);
            User::create(array_merge($user_data, array('individual_id' => $individual->individual_id, 'permissions' => 'test')));
        }

        $redirect = $request->has('password') ? array('list_users' => 'true') : array();

        return redirect()->route('individuals.list', $redirect);
    }
}
