<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FileloadController extends Controller
{
    public function load( Request $request, User $user){

        switch ($request->type) {
            case 'avatar':
                $user = User::find($user->id);
                $path = $request->file('image')->store('avatar','public');
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
