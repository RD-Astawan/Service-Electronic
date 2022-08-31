<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Servis;
use App\Models\SMSGateway;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->Servis = new Servis();
    }

    public function laporan_servis(Request $request){
        $tgl_mulai = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;

        $data_akhir = DB::table('servis')
                    ->join('users', 'servis.id_user', '=', 'users.id')
                    ->whereBetween('tgl_barang_diambil', [$tgl_mulai, $tgl_selesai])
                    ->get();
        return view('laporan.servis.cetak_lap_servis', compact('data_akhir','tgl_mulai','tgl_selesai'));
    }

    public function laporan_pemasukan(Request $request){
        $tgl_mulai = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;

        $data_akhir = Servis::whereBetween('tgl_barang_diambil', [$tgl_mulai, $tgl_selesai])->get();
        $sum_biaya  = Servis::whereBetween('tgl_barang_diambil', [$tgl_mulai, $tgl_selesai])->sum('biaya_servis');
        return view('laporan.pemasukan.cetak_lap_pemasukan', compact('data_akhir','tgl_mulai','tgl_selesai','sum_biaya'));
    }

    public function laporan_sms(Request $request){
        $tgl_mulai = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;

        $data_akhir = SMSGateway::whereBetween('tgl_terkirim', [$tgl_mulai, $tgl_selesai])->get();
        return view('laporan.sms.cetak_lap_sms', compact('data_akhir','tgl_mulai','tgl_selesai'));
    }
}
