<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servis;
use App\Models\SMSGateway;
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
        $this->SMSGateway = new SMSGateway();
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
        $data = DB::table('servis')->select(DB::raw('MAX(RIGHT(id_servis,1)) as kode'));
        $kd = "";
        if($data->count() > 0){
            foreach ($data->get() as $row) {
                $tmp = ((int)$row->kode)+1;
                $kd = sprintf("%01s",$tmp);
            }
        }
        else{
            $kd = "1";
        }

        $users = DB::table('users')->where('level', 'customer')->get();
        //
        return view('add_servis', compact('users','kd'));
    }

    public function store(Request $request)
    {
        // request()->validate([
        //     'id_user' => ['required'],
        //     // add rules for other fields
        // ]);
        
        Servis::create([
            'id_servis' => $request->id_servis,
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
        Alert::success('Berhasil', 'Data Servis berhasil ditambahkan');
        return redirect('servis');
    }

    public function edit($id_servis){
        if(!$this->Servis->showonedata_servis($id_servis)){
            abort(404);
        }
        $data_servis = [
            'servis' => $this->Servis->showonedata_servis($id_servis),
        ];
        $users = DB::table('users')->where('level', 'customer')->get();
        return view('edit_servis', $data_servis)
        ->with(compact('users'))
        ->with('$data');
    }

    public function update(Request $request, $id)
    {
 
        $servis = Servis::find($id);
        
            $servis->id_user             = $request->id_user;
            $servis->jenis_barang        = $request->jenis_barang;
            $servis->merk_barang         = $request->merk_barang;
            $servis->tipe_barang         = $request->tipe_barang;
            $servis->tgl_masuk_barang    = $request->tgl_masuk_barang;
            $servis->biaya_servis        = $request->biaya_servis;
            $servis->garansi             = $request->garansi;
            $servis->tgl_barang_diambil  = $request->tgl_barang_diambil;
            $servis->status              = $request->status;
        
        $servis->save();

        Alert::success('Berhasil', 'Data Servis berhasil diedit');
        return redirect('/servis');
    }

    public function showsms(){
        $data = DB::table('s_m_s_gateways')->select(DB::raw('MAX(RIGHT(id_sms,1)) as kode'));
        $kd = "";
        if($data->count() > 0){
            foreach ($data->get() as $row) {
                $tmp = ((int)$row->kode)+1;
                $kd = sprintf("%01s",$tmp);
            }
        }
        else{
            $kd = "1";
        }
        $data = [
            'no_hp' => $this->Servis->allNoHp(),
            'kd' => $kd,
            
        ];
        return view('sms', $data);
    }

    public function sendCustomMessage(Request $request)
    {
        \Validator::make($request->all(), [
            'no_hp' => 'required|array',
            'body' => 'required',
        ])->validate();
        $recipients = $request->no_hp;
     
        foreach ($recipients as $recipient) {
            $this->sendMessage($request->body, $recipient);
        }

        // SMSGateway::create([
        //     'id_sms' => $request->id_sms,
        //     'isi_pesan' => $request->body,
        //     'tgl_terkirim' => $request->tgl_terkirim,
        // ]);
        $data = $request->all();
        $data['no_hp'] = implode(',', $request->no_hp);
        $data['isi_pesan'] = $request->body;
        SMSGateway::create($data);
        //return dd($data);
        return back()->with(['success' => "Pesan Berhasil Dikirim!"]);
        
    }
   
    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, ['from' => $twilio_number, 'body' => $message]);
    }

    public function destroy($id_servis)
    {
        $servis = Servis::find($id_servis);
 
        $servis->delete();

        Alert::success('Berhasil', 'Data Servis berhasil dihapus');
        return redirect('/servis');
    }
}
