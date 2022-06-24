<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->User = new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username' => $request->username,
            'password' => Hash::make($request->username),
            'level' => $request->level,
            
        ]);

        //Alert::success('Berhasil','Data User Ditambahkan');
        Alert::success('Berhasil', 'Data User berhasil ditambahkan');
        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->User->showonedata($id)){
            abort(404);
        }
        $data = [
            'user' => $this->User->showonedata($id),
        ];
        return view('edit_user', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 
        $user = User::find($id);
        
            $user->nama          = $request->nama;
            $user->alamat        = $request->alamat;
            $user->no_hp         = $request->no_hp;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->username      = $request->username;
            $user->password      = Hash::make($request->username);
            $user->level         = $request->level;
        
        $user->save();

        Alert::success('Berhasil', 'Data User berhasil diedit');
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
 
        $user->delete();

        Alert::success('Berhasil', 'Data User berhasil dihapus');
        return redirect('user');
    }
}
