<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servis;
use App\Models\ManagementDashboard;
use App\Models\Profile;
use App\Models\User;
use App\Models\TipPerawatan;
use Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Storage;

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

    public function show_beranda(){
        $data = ManagementDashboard::all();
        return view('show_beranda', compact('data'));
    }

    public function add_beranda(){
        return view('add_beranda');
    }

    public function save_beranda(Request $request){
        $validateData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:jpg,png,jpeg|image|max:2048',
        ]);

        if($request->file('gambar')->isValid()){
            $path = $request->file('gambar')->store('uploads');
        }
        else{
            $path = '';
        }

        $data = new ManagementDashboard;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->gambar = $path;
        $data->save();

        Alert::success('Berhasil', 'Data beranda berhasil ditambahkan');
        return redirect('show_beranda');
    }

    public function show_edit_beranda($id_beranda){
        $data = ManagementDashboard::find($id_beranda);
        return view('edit_beranda', compact('data'));
    }

    public function edit_beranda(Request $request, $kode){
        $validateData = $request->validate([
            'gambar' => 'required|mimes:jpg,png,jpeg|image|max:2048',
        ]);

        if($request->file('gambar')->isValid()){
            $path = $request->file('gambar')->store('uploads');
        }
        else{
            $path = '';
        }

        $data = ManagementDashboard::find($kode);
        $check_image = $data->gambar;
        if($check_image != null || $check_image != ''){
            Storage::delete($check_image);
        }
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->gambar = $path;
        $data->save();
    }

    public function destroy_beranda($id_beranda){
        $data = ManagementDashboard::find($id_beranda);
        $check_image = $data->gambar;
        if($check_image != null || $check_image != ''){
            Storage::delete($check_image);
        }
        $data->delete();

        Alert::success('Berhasil', 'Data beranda berhasil dihapus');
        return redirect('show_beranda');
    }

    public function show_profile(){
        $data = Profile::all();
        return view('show_profile', compact('data'));
    }

    public function add_profile(){
        return view('add_profile');
    }

    public function save_profile(Request $request){
        $validateData = $request->validate([
            'gambar' => 'mimes:jpg,png,jpeg|image|max:2048',
        ]);

        if($request->file('gambar')->isValid()){
            $path = $request->file('gambar')->store('uploads');
        }
        else{
            $path = '';
        }

        $data = new Profile;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->gambar = $path;
        $data->save();

        Alert::success('Berhasil', 'Data profile berhasil ditambahkan');
        return redirect('show_profile');
    }

    public function show_edit_profile($kode){
        $data = Profile::find($kode);
        return view('edit_profile', compact('data'));
    }

    public function edit_profile(Request $request, $kode){
        $validateData = $request->validate([
            'gambar' => 'required|mimes:jpg,png,jpeg|image|max:2048',
        ]);

        if($request->file('gambar')->isValid()){
            $path = $request->file('gambar')->store('uploads');
        }
        else{
            $path = '';
        }

        $data = Profile::find($kode);
        $check_image = $data->gambar;
        if($check_image != null || $check_image != ''){
            Storage::delete($check_image);
        }
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->gambar = $path;
        $data->save();

        Alert::success('Berhasil', 'Data profile berhasil dirubah');
        return redirect('show_profile');
    }

    public function destroy_profile($id_profile){
        $data = Profile::find($id_profile);
        $check_image = $data->gambar;
        if($check_image != null || $check_image != ''){
            Storage::delete($check_image);
        }
        $data->delete();

        Alert::success('Berhasil', 'Data beranda berhasil dihapus');
        return redirect('show_profile');
    }

    public function show_tips(){
        $data = TipPerawatan::all();
        return view('show_tips', compact('data'));
    }

    public function add_tips(){
        return view('add_tips');
    }

    public function save_tips(Request $request){
        $validateData = $request->validate([
            'gambar' => 'required|mimes:jpg,png,jpeg|image|max:2048',
        ]);

        if($request->file('gambar')->isValid()){
            $path = $request->file('gambar')->store('uploads');
        }
        else{
            $path = '';
        }
        $data = new TipPerawatan;
        $data->judul = $request->judul;
        $data->gambar = $path;
        $data->save();
        if(count($data->listperawatan) == 0){
            foreach($request->list_tips as $x){
                $data->listperawatan()->create(['list_tips' => $x]);
            }
        }else{
            //$data->listperawatan()->delete();
            foreach($request->list_tips as $x){
                $data->listperawatan()->create(['list_tips' => $x]);
            }
        }

        Alert::success('Berhasil', 'Data tips berhasil ditambahkan');
        return redirect('show_tips');
    }

    public function show_edit_tips($kode){
        $data = TipPerawatan::find($kode);
        return view('edit_tips', compact('data'));
    }

    public function edit_tips(Request $request, $kode){
        $validateData = $request->validate([
            'gambar' => 'required|mimes:jpg,png,jpeg|image|max:2048',
        ]);

        if($request->file('gambar')->isValid()){
            $path = $request->file('gambar')->store('uploads');
        }
        else{
            $path = '';
        }

        $data = TipPerawatan::find($kode);
        $data->judul = $request->judul;
        $data->gambar = $path;
        $data->save();
        if(count($data->listperawatan) == 0){
            foreach($request->list_tips as $x){
                $data->listperawatan()->create(['list_tips' => $x]);
            }
        }else{
            $data->listperawatan()->delete();
            foreach($request->list_tips as $x){
                $data->listperawatan()->create(['list_tips' => $x]);
            }
        }

        Alert::success('Berhasil', 'Data Tips Perawatan berhasil dirubah');
        return redirect('show_tips');
    }

    public function destroy_tips($id_tips){
        $data = TipPerawatan::find($id_tips);
        $data->listperawatan()->delete();
        $check_image = $data->gambar;
        if($check_image != null || $check_image != ''){
            Storage::delete($check_image);
        }
        $data->delete();

        Alert::success('Berhasil', 'Data beranda berhasil dihapus');
        return redirect('show_tips');
    }
    
    
}
