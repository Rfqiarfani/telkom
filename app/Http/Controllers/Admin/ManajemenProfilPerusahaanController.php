<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManajemenProfilPerusahaanController extends Controller
{
    public function index()
    {
        return view('admin.manajemen-profil-perusahaan.index'); // Pastikan Anda memiliki view ini
    }
}
