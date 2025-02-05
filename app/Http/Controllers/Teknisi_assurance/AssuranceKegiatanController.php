<?php

namespace App\Http\Controllers\Teknisi_assurance;

use App\Http\Controllers\Controller;
use App\Models\KegiatanModel;
use Illuminate\Http\Request;

class AssuranceKegiatanController extends Controller
{
    public function tambahkegiatan(Request $request)
    {
        KegiatanModel::create([
            'no_order' => $request->no_order,
            'jenis_wo' => $request->jenis_wo,
            'status' => $request->status, 
            'status_approve' => 'Menunggu',
            'jenis' => 'Assurance',
        ]);
    
        return redirect()->route('teknisi_assurance.kegiatan')
                 ->with('message', 'Data Berhasil ditambahkan.');
    }

    public function hapuskegiatan(Request $request)
    {
        $kegiatan=KegiatanModel::find($request->id_kegiatan);
    $kegiatan->delete();

    return redirect()->route('teknisi_assurance.kegiatan')
             ->with('message', 'Data Berhasil dihapus.');
    }

    public function tampilkegiatan(Request $request)
    {
        $data=KegiatanModel::where('jenis','Assurance')->get();
    return view('teknisi_assurance.kegiatan',compact('data'));
    }
}
