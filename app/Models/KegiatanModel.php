<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanModel extends Model
{
    use HasFactory;
    protected $primaryKey ='id_kegiatan';
    public $timestamps = false;
    protected $table = 'kegiatan';
    protected $fillable = [
        'no_order',
        'jenis_wo',
        'status',
        'status_approve',
    ];
}
