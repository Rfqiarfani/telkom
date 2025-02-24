<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KegiatanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvisioningController extends Controller
{
    public function index()
    {
        // Query untuk menghitung total poin
        $users = User::leftJoin('kegiatan', 'kegiatan.id_user', '=', 'users.id')
            ->select(
                'users.id',
                'users.name',
                DB::raw('COALESCE(SUM(
                CASE
                    WHEN kegiatan.status_approve = "Disetujui" THEN
                        CASE
                            WHEN kegiatan.jenis_wo IN ("datin", "digipos", "expand", "indibiz", "pda") THEN 4
                            WHEN kegiatan.jenis_wo IN ("mo", "orbit", "stb", "dismant") THEN 2
                            ELSE 0
                        END
                    ELSE 0
                END
            ), 0) as total_point')
            )
            ->where('users.role', 'Teknisi')
            ->groupBy('users.id', 'users.name')
            ->get();

        // Mengambil data kegiatan provisioning
        $data = KegiatanModel::join('users', 'users.id', 'kegiatan.id_user')
            ->where('jenis', 'Provisioning')
            ->get();

        // Pastikan variabel $data terdefinisi
        if (!isset($data)) {
            $data = []; // Inisialisasi sebagai array kosong jika tidak ada data
        }

        return view('admin.provisioning.index', compact('data', 'users'));
    }

    public function setujukegiatan(Request $request)
    {
        $kegiatan = KegiatanModel::find($request->id_kegiatan);

        $jenis_wo = strtolower($kegiatan->jenis_wo); // Pastikan tidak case-sensitive
        $point = 0;

        if (in_array($jenis_wo, ["datin", "digipos", "expand", "indibiz", "pda"])) {
            $point = 4;
        } elseif (in_array($jenis_wo, ["mo", "orbit", "stb", "dismant"])) {
            $point = 2;
        }

        $kegiatan->update([
            'status_approve' => 'Disetujui',
            'point' => $point,
        ]);
    }

    public function tolakkegiatan(Request $request)
    {
        $kegiatan = KegiatanModel::find($request->id_kegiatan);
        $kegiatan->update([
            'status_approve' => 'Ditolak',
            'point' => 0, // Poin diatur 0 untuk kegiatan yang ditolak
        ]);

        return redirect()->route('admin.provisioning.index')
            ->with('message', 'Data Berhasil ditolak.');
    }
}
