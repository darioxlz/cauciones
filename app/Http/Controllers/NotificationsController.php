<?php

namespace App\Http\Controllers;

use App\Models\Caution;
use App\Models\File;
use App\Models\Individual;
use App\Models\Misdeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    function form(Request $request)
    {
        $individuals = Individual::doesntHave('user')->get();
        $misdeeds = Misdeed::all();

        return view('notifications.createNotification')->with(compact('individuals', 'misdeeds'));
    }

    function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'individual_id' => 'required|integer|exists:individuals,individual_id',
            'misdeed_id' => 'required|integer|exists:misdeeds,misdeed_id',
            'description' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $create_caution = false;
        $url = null;

        $data = array_merge($request->all(), array('created_at' => date('Y-m-d'), 'created_by' => Auth::id()));

        if ($request->has('image')) {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $create_caution = true;

                $request->validate([
                    'image' => 'mimes:jpg,jpeg,png|max:3096',
                ]);

                $filename = basename($request->file('image')->getClientOriginalName(), '.'.$request->file('image')->getClientOriginalExtension());
                $extension = $request->file('image')->extension();

                $request->file('image')->storeAs('/public', $filename.".".$extension);

                $url = Storage::url($filename.".".$extension);
            } else {
                return back()->withErrors(['image' => 'Debes seleccionar una imagen']);
            }
        }

        $file = File::create($data);

        if ($create_caution) {
            Caution::create([
                'file_id' => $file['file_id'],
                'image_path' => $url,
                'created_at' => date('Y-m-d'),
                'created_by' => Auth::id()
            ]);
        }

        $redirect = $request->has('image') ? array('list_cautions' => 'true') : array();

        return redirect()->route('notifications.list', $redirect);
    }
}
