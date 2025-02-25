<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Tambahkan ini
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
        'jenis',
        'tanggal',
        'id_user',
        'point'
    ];
     // Relasi ke User
     public function user()
     {
         return $this->belongsTo(User::class, 'id_user', 'id');
     }
}
