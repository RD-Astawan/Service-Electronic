<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class servis extends Model
{
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'id_servis';
    protected $keyType = 'string';
    
    protected $fillable = [
        'id_servis',
        'id_user',
        'jenis_barang',
        'merk_barang',
        'tipe_barang',
        'tgl_masuk_barang',
        'biaya_servis',
        'garansi',
        'tgl_barang_diambil',
        'status',
    ];

    public function allData(){
        return DB::table('servis')
            ->join('users', 'servis.id_user', '=', 'users.id')
            ->get();
    }
    public function allNoHp(){
        return DB::table('users')
            ->join('servis', 'users.id', '=', 'servis.id_user')
            ->where('users.level', 'customer')
            ->where('servis.status', 'selesai')
            ->get();
    }
    public function showonedata_servis($id_servis){
        return DB::table('servis')->where('id_servis', $id_servis)->first();
    }
    // public function showonedata($id){
    //     return DB::table('users')->where('id', $id)->first();
    // }

    
}
