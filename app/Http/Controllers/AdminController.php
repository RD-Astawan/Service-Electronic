<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servis;
use App\Models\SMSGateway;
use App\Models\User;
use Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Servis = new Servis();
    }
    public function index(){
        return view('admin-dashboard');
    }
    public function show()
    {
        $data = [
            'servis' => $this->Servis->allData(),
        ];
        return view('laporan_servis', $data);
    }
    public function laporan_pemasukan()
    {
        $data = [
            'servis' => $this->Servis->allData(),
        ];
        return view('laporan_pemasukan', $data);
    }
    public function laporan_pesan()
    {
        $data = SMSGateway::all();
        return view('laporan_pesan', compact('data'));
    }
    
}
