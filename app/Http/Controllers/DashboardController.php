<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servis;
use App\Models\SMSGateway;
use App\Models\User;
use Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use PDF;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $admin = User::where('level', '=', 'admin')->count();
        $teknisi = DB::table('users')->where('level', 'teknisi')->count();
        $customer = DB::table('users')->where('level', 'customer')->count();
        $servis = Servis::all();
        $servis_2 = Servis::all()->count();
        if(auth()->user()->level == 'admin'){
            return view('admin-dashboard', compact('admin','teknisi','customer','servis'));
        }
        elseif(auth()->user()->level == 'teknisi'){
            return view('teknisi-dashboard', compact('servis_2','servis'));
        }
    }
    public function createPDF() {
        $servis = Servis::all();
        $pdf = PDF::loadView('laporan_pemasukan', ['servis' =>$servis]);
        // download PDF file with download method
        return $pdf->download('Laporan-pemasukan.pdf');
    }

    public function createPDF_servis() {
    $servis = Servis::all();
    $pdf = PDF::loadView('laporan_servis', ['servis' =>$servis]);
    // download PDF file with download method
    return $pdf->download('Laporan-servis.pdf');
    }

    public function createPDF_pesan() {
        $data = SMSGateway::all();
        $pdf = PDF::loadView('laporan_pesan', ['data' =>$data]);
        // download PDF file with download method
        return $pdf->download('Laporan-pesan.pdf');
        }
}
