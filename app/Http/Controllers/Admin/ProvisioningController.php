<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProvisioningController extends Controller
{
    public function index()
    {
        return view('admin.provisioning.index'); // Pastikan Anda memiliki view ini
    }
}
