<?php

namespace App\Http\Controllers\Teknisi_assurance;

use App\Http\Controllers\Controller;
use App\Models\KegiatanModel;
use Illuminate\Http\Request;

class AssuranceProduktivitasController extends Controller
{
    public function tampilproduktivitas(Request $request)
    {
        if($request->input("tanggal_awal") && $request->input("tanggal_akhir")){
            // ini yang di filter
        $data=KegiatanModel::whereBetween('tanggal', [$request->input("tanggal_awal"),$request->input("tanggal_akhir")])->where('jenis','Assurance')->where('status_approve','Disetujui')->get();
        } else{
            // tidak di filter
        $data=KegiatanModel::where('jenis','Assurance')->where('status_approve','Disetujui')->get();
    }
        
        return view('teknisi_assurance.produktivitas',compact('data')); 
    }

}
