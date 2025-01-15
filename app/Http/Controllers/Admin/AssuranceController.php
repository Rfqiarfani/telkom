<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssuranceController extends Controller
{
    public function index()

    {

        return view('admin.assurance.index'); // Pastikan Anda memiliki view ini

    }
}
