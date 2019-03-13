<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FileloadController extends Controller
{
    public function load( Request $request ){

        switch ($request->type) {
            case 'avatar':
                // dd($request);
                $user = User::find(Auth::id());
                $path = $request->file('image')->store('avatar','public');
                // Storage::put('avatar/'.$id ,$file);
                $user->image_link = $path;
                $user->save();
                return redirect()->back();
                break;
            default:
                dd($request);
                break;
        }
        // return redirect()->back();
    }
}
