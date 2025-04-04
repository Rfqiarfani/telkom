<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KegiatanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssuranceController extends Controller
{
    public function index()

    {
        $users = User::leftJoin('kegiatan', 'kegiatan.id_user', '=', 'users.id')
    ->select('users.id', 'users.name', DB::raw('COALESCE(SUM(kegiatan.point), 0) as total_point'))->where('users.role', 'Teknisi')->groupBy('users.id', 'users.name')->get();
        $data=KegiatanModel::join('users','users.id','kegiatan.id_user')->where('jenis','Assurance')->get();
    return view('admin.assurance.index',compact('data','users'));


    }
    public function setujukegiatan(Request $request)
    {
        $kegiatan = KegiatanModel::find($request->id_kegiatan);
        $kegiatan->update([
            'status_approve' => 'Disetujui',
            'point' => '2',
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