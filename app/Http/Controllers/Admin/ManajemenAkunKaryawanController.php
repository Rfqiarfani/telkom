<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManajemenAkunKaryawanController extends Controller
{

    public function index()
    {

        $users = User::all();

        return view('admin.manajemen-akun-karyawan.index', compact('users'));

    }



    public function create()
    {

        return view('admin.manajemen-akun-karyawan.create');

    }


    public function store(Request $request)
    {

        $request->validate([

            'nik' => 'required|unique:users',

            'password' => 'required',

            'name' => 'required',

            'role' => 'required',

        ]);


        User::create([

            'nik' => $request->nik,

            'password' => Hash::make($request->password),

            'name' => $request->name,

            'role' => $request->role,

        ]);


        return redirect()->route('manajemen-akun-karyawan.index')->with('success', 'User  created successfully.');

    }


    public function edit(User $user)
    {

        return view('admin.manajemen-akun-karyawan.edit', compact('user'));

    }


    public function update(Request $request, User $user)
    {

        $request->validate([

            'nik' => 'required|unique:users,nik,' . $user->id,

            'name' => 'required',

            'role' => 'required',

        ]);


        $user->update([

            'nik' => $request->nik,

            'name' => $request->name,

            'role' => $request->role,

        ]);


        if ($request->filled('password')) {

            $user->password = Hash::make($request->password);

            $user->save();

        }


        return redirect()->route('manajemen-akun-karyawan.index')->with('success', 'User  updated successfully.');

    }


    public function destroy(User $user)
    {

        $user->delete();

        return redirect()->route('manajemen-akun-karyawan.index')->with('success', 'User  deleted successfully.');

    }

}
