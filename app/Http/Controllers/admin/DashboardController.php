<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //Dashboard menu 
    public function dashboard(){
        return view('admin.dashboard');
    }
}
