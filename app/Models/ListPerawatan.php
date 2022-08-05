<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPerawatan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'id_list_perawatan';

    public function listperawatan(){
        return $this->morphTo(__FUNCTION__,'referensi_type','referensi_id');
    }
}
