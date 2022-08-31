<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index(){
        return view('customer-dashboard');
    }
    public function read(){
        return 'Silahkan melakukan pencarian data';
    }
    public function search(Request $request){
        $id = $request->id;
        $results= DB::table('servis')
                    ->join('users', 'servis.id_user', '=', 'users.id')
                    ->where('id_servis','like','%'.$id.'%')
                    ->get();
        $count = count($results);
        if($count == 0){
            return '<p class="text-muted">Maaf, data tidak berhasil ditemukan</p>';
        }
        else{
            return view('search')->with([
                'data' => $results
            ]);
        }
    }
}
