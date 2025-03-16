<?php

namespace App\Http\Controllers\Admin;

use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function exportExcel(Request $request)
    {
        // Ambil parameter role dari request
        $role = $request->query('role');

        // Nama file sesuai dengan role
        $fileName = 'laporan_' . strtolower(str_replace(' ', '_', $role)) . '.xlsx';

        return Excel::download(new LaporanExport($role), $fileName);
    }
}
