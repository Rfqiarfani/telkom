<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KegiatanModel;
use App\Models\User;
use Illuminate\Http\Request;

class ProvisioningController extends Controller
{
    public function index()
    {
        $users = User::leftJoin('kegiatan', 'kegiatan.id_user', '=', 'users.id')
    ->select('users.id', 'users.name', \DB::raw('COALESCE(SUM(kegiatan.point), 0) as total_point'))->where('users.role', 'Teknisi')->groupBy('users.id', 'users.name')->get();
        $data=KegiatanModel::join('users','users.id','kegiatan.id_user')->where('jenis','Provisioning')->get();
    return view('admin.provisioning.index',compact('data','users'));

    }
    public function setujukegiatan(Request $request)
    {
        $kegiatan = KegiatanModel::find($request->id_kegiatan);
        $kegiatan->update([
            'status_approve' => 'Disetujui',
            'point' => '2',
        ]);

        return redirect()->route('provisioning.index')
                 ->with('message', 'Data Berhasil disetujui.');
    }
    public function tolakkegiatan(Request $request)
    {
        $kegiatan = KegiatanModel::find($request->id_kegiatan);
        $kegiatan->update([
            'status_approve' => 'Ditolak',
        ]);

        return redirect()->route('provisioning.index')
                 ->with('message', 'Data Berhasil ditolak.');
    }

}
