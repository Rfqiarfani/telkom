<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KegiatanModel;
use App\Models\User;
use Illuminate\Http\Request;

class ProduktivitasAssuranceController extends Controller
{
    public function produktivitas_assurance()

    {
        $users = User::leftJoin('kegiatan', 'kegiatan.id_user', '=', 'users.id')
    ->select('users.id', 'users.name', \DB::raw('COALESCE(SUM(kegiatan.point), 0) as total_point'))->where('users.role', 'Teknisi')->groupBy('users.id', 'users.name')->get();
        $data=KegiatanModel::join('users','users.id','kegiatan.id_user')->where('jenis','Assurance')->get();
    return view('admin.produktivitas.produktivitas_assurance',compact('data','users'));


    }
   
}