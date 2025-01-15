<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExportLaporanController extends Controller
{
    public function index()
    {
        return view('admin.export-laporan.index'); // Pastikan Anda memiliki view ini
    }
}
