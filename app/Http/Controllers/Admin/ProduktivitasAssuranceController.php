<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KegiatanModel;
use App\Models\User;
use Illuminate\Http\Request;

class ProduktivitasAssuranceController extends Controller
{
    public function produktivitas_assurance(Request $request)

    {
       

        if ($request->input("tanggal_awal") && $request->input("tanggal_akhir")) {
            $tanggal_awal = $request->input("tanggal_awal");
            $tanggal_akhir = $request->input("tanggal_akhir");
        
            // Filter berdasarkan tanggal dengan LEFT JOIN agar users tetap muncul meskipun tidak ada kegiatan
            $users = User::leftJoin('kegiatan', function ($join) use ($tanggal_awal, $tanggal_akhir) {
                    $join->on('kegiatan.id_user', '=', 'users.id')
                        ->whereBetween('kegiatan.tanggal', [$tanggal_awal, $tanggal_akhir]);
                })
                ->select('users.id', 'users.nik', 'users.name', \DB::raw('COALESCE(SUM(kegiatan.point), 0) as total_point'))
                ->where('users.role', 'Teknisi Assurance')
                ->groupBy('users.id', 'users.nik', 'users.name')
                ->get();
        
            // Mengambil data kegiatan yang sesuai dengan filter tanggal
            $data = KegiatanModel::join('users', 'users.id', 'kegiatan.id_user')
                ->where('jenis', 'Assurance')
                ->whereBetween('kegiatan.tanggal', [$tanggal_awal, $tanggal_akhir])
                ->get();
        } else {
            // Tidak menggunakan filter tanggal, tetapi tetap menampilkan semua pengguna
            $users = User::leftJoin('kegiatan', 'kegiatan.id_user', '=', 'users.id')
                ->select('users.id', 'users.nik', 'users.name', \DB::raw('COALESCE(SUM(kegiatan.point), 0) as total_point'))
                ->where('users.role', 'Teknisi Assurance')
                ->groupBy('users.id', 'users.nik', 'users.name')
                ->get();
        
            $data = KegiatanModel::join('users', 'users.id', 'kegiatan.id_user')
                ->where('jenis', 'Assurance')
                ->get();
        }
    return view('admin.produktivitas.produktivitas_assurance',compact('data','users'));


    }
   
}