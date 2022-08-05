<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class SMSGateway extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'id_sms';
    protected $keyType = 'string';

    protected $fillable = [
        'id_sms',
        'isi_pesan',
        'tgl_terkirim',
        'no_hp',
    ];
    public function setCategoryAttribute($value)
    {
        $this->attributes['no_hp'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['no_hp'] = json_decode($value);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
