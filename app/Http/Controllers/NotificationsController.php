<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    function index(Request $request)
    {
        if ($request->has('list_cautions')) {
            $data = File::has('caution')->paginate(5);
        } else {
            $data = File::doesntHave('caution')->paginate(5);
        }

        // TODO add individual data (firstnames, surnames, cedula)

        return view('listNotifications', compact('data'));
    }
}
