<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servis;
use App\Models\User;
use Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;

class TeknisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Servis = new Servis();
    }

    public function index(){
        return view('teknisi-dashboard');
    }

    public function show()
    {
        // $servis = Servis::all();
        // return view('servis', compact('servis'));
        $data = [
            'servis' => $this->Servis->allData(),
        ];
        return view('servis', $data);
    }

    public function create()
    {
        $users = DB::table('users')->where('level', 'customer')->get();
        //
        return view('add_servis', compact('users'));
    }

    public function store(Request $request)
    {
        // request()->validate([
        //     'id_user' => ['required'],
        //     // add rules for other fields
        // ]);
        
        Servis::create([
            'id_user' => $request->id_user,
            'jenis_barang' => $request->jenis_barang,
            'merk_barang' => $request->merk_barang,
            'tipe_barang' => $request->tipe_barang,
            'tgl_masuk_barang' => $request->tgl_masuk_barang,
            'biaya_servis' => $request->biaya_servis,
            'garansi' => $request->garansi,
            'tgl_barang_diambil' => $request->tgl_barang_diambil,
            'status' => $request->status,
            
        ]);

        //Alert::success('Berhasil','Data User Ditambahkan');
        Alert::success('Berhasil', 'Data User berhasil ditambahkan');
        return redirect('user');
    }

    public function showsms(){
        $data = [
            'no_hp' => $this->Servis->allNoHp(),
        ];
        return view('sms', $data);
    }

    public function sendCustomMessage(Request $request)
    {
        \Validator::make($request->all(), [
            'contact' => 'required|array',
            'body' => 'required',
        ])->validate();
        $recipients = $request->contact;
     
        foreach ($recipients as $recipient) {
            $this->sendMessage($request->body, $recipient);
        }
        return back()->with(['success' => "Message on its way to recipients!"]);
    }
   
    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, ['from' => $twilio_number, 'body' => $message]);
    }
}
