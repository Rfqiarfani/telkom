<?php

namespace App\Http\Controllers\Admin;

use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Tambahkan ini
use App\Models\User;

class ExportLaporanController extends Controller
{
    public function index(Request $request) {
        // Ambil parameter tim teknisi dari request
        $team = $request->query('team');

        // Query user berdasarkan role, KECUALI Admin
        $users = User::with('kegiatan')
            ->where('role', '!=', 'Admin') // Filter agar Admin tidak ikut
            ->when($team, function ($query) use ($team) {
                return $query->where('role', $team);
            })
            ->get();

        return view('admin.export-laporan.index', compact('users', 'team'));
    }


    public function exportExcel()
    {
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }
}
