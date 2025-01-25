<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KegiatanModel;
use Illuminate\Http\Request;

class AssuranceController extends Controller
{
    public function index()

    {
        $data=KegiatanModel::all();
    return view('admin.assurance.index',compact('data'));


    }
    public function setujukegiatan(Request $request)
    {
        $kegiatan = KegiatanModel::find($request->id_kegiatan);
        $kegiatan->update([
            'status_approve' => 'Disetujui',
        ]);
    
        return redirect()->route('assurance.index')
                 ->with('message', 'Data Berhasil disetujui.');
    }
    public function tolakkegiatan(Request $request)
    {
        $kegiatan = KegiatanModel::find($request->id_kegiatan);
        $kegiatan->update([
            'status_approve' => 'Ditolak',
        ]);
    
        return redirect()->route('assurance.index')
                 ->with('message', 'Data Berhasil ditolak.');
    }
}