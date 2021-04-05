<?php

namespace App\Http\Controllers;

use App\Models\Individual;
use Illuminate\Http\Request;

class IndividualsController extends Controller
{
    function index(Request $request)
    {
        if ($request->has('list_users')) {
            $data = Individual::has('user')->get();
        } else {
            $data = Individual::doesntHave('user')->get();
        }

        return view('listIndividuals', compact('data'));
    }
}
