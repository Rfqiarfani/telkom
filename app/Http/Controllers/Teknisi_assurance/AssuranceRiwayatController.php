<?php

namespace App\Http\Controllers\Teknisi_assurance;

use App\Http\Controllers\Controller;
use App\Models\KegiatanModel;
use Illuminate\Http\Request;

class AssuranceRiwayatController extends Controller
{
    public function tampilriwayat(Request $request)
    {
        $data=KegiatanModel::select('kegiatan.*', 'users.name')
        ->join('users', 'users.id', '=', 'kegiatan.id_user')
        ->where('jenis','Assurance')
        ->where('status_approve','Disetujui')
        ->orWhere('status_approve','Ditolak')
        ->get();
    return view('teknisi_assurance.riwayat',compact('data'));
    }
    
}