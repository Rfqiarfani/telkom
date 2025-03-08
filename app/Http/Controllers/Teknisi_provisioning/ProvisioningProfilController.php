<?php


namespace App\Http\Controllers\Teknisi_provisioning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProvisioningProfilController extends Controller
{
    public function index()
    {
        return view('teknisi_provisioning.profil.index'); // Pastikan Anda memiliki view ini
    }
}