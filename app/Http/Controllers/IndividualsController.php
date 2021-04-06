<?php

namespace App\Http\Controllers;

use App\Models\Individual;
use Illuminate\Http\Request;

class IndividualsController extends Controller
{
    function index(Request $request)
    {
        if ($request->has('list_users')) {
            $data = Individual::has('user')->paginate(5);
        } else {
            $data = Individual::doesntHave('user')->paginate(5);
        }

        return view('listIndividuals', compact('data'));
    }
}
