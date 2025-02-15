<?php

namespace App\Http\Controllers\Teknisi_provisioning;

use App\Http\Controllers\Controller;
use App\Models\KegiatanModel;
use Illuminate\Http\Request;

class ProvisioningRiwayatController extends Controller
{
    public function tampilriwayat(Request $request)
    {
        $data=KegiatanModel::where("jenis","Provisioning")->where("status_approve","Disetujui")->orWhere("status_approve","Ditolak")->get();
        return view('teknisi_provisioning.riwayat',compact("data"));
    }
}
