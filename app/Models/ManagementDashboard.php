<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementDashboard extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_beranda';
    
    protected $fillable = [
        'id_beranda',
        'judul',
        'Deskripsi',
        'gambar',
    ];
}
