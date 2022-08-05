<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipPerawatan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_tips';
    
    protected $fillable = [
        'id_tips',
        'judul',
        'gambar',
    ];

    public function listperawatan(){
        return $this->morphMany(ListPerawatan::class, 'referensi');
    }
}
