<?php


namespace App\Http\Controllers\Teknisi_assurance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssuranceProfilController extends Controller
{
    public function index()
    {
        return view('teknisi_assurance.profil.index'); // Pastikan Anda memiliki view ini
    }
}