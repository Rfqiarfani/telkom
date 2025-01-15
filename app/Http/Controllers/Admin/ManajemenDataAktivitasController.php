<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManajemenDataAktivitasController extends Controller
{
    public function index()
    {
        return view('admin.manajemen-data-aktivitas.index'); // Pastikan Anda memiliki view ini
    }
}
