<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        if(auth()->user()->level == 'admin'){
            return view('admin-dashboard');
        }
        elseif(auth()->user()->level == 'teknisi'){
            return view('teknisi-dashboard');
        }
    }
}
