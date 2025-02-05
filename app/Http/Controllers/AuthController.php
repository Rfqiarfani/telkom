<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Tampilan login untuk teknisi
    }

    public function showAdminLoginForm()
    {
        return view('login'); // Tampilan login untuk admin
    }

    public function login(Request $request)

    {

        // Validasi input

        $credentials = $request->validate([

            'nik' => 'required',

            'password' => 'required',

        ]);


        // Mencari pengguna berdasarkan NIK

        $user = User::where('nik', $credentials['nik'])->first();


        // Memeriksa apakah pengguna ada dan password cocok

        if ($user && Hash::check($credentials['password'], $user->password)) {

            Auth::login($user);


            // Menyimpan nama teknisi dalam session flash

            session()->flash('message', 'Selamat datang, ' . $user->name);


            // Redirect berdasarkan role

            if ($user->role === 'Admin') {

                return redirect()->route('admin.dashboard');  // Untuk admin

            } elseif ($user->role === 'Teknisi') {
                session()->put('id_user',$user->id);

                return redirect()->route('teknisi_provisioning.dashboard');  // Untuk teknisi

            }

        }


        // Jika login gagal

        return back()->withErrors(['login' => 'NIK atau Password salah!']);

    }

    public function adminLogin(Request $request)
    {
        return $this->login($request); // Gunakan fungsi login yang sama
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/'); // Redirect ke landing page
    }
}
