<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManajemenAkunPenggunaController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.manajemen-akun-pengguna.index', compact('users'));
    }

    public function create()
    {
        return view('admin.manajemen-akun-pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|unique:users',
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

        return redirect()->route('manajemen-akun-pengguna.index')->with('success', 'Your work has been saved');

    }

    public function edit(User $user)
    {
        return view('admin.manajemen-akun-pengguna.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
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

        $user->update($validatedData);

    return redirect()->route('manajemen-akun-pengguna.index')->with('message',  'Akun berhasil diperbarui!');

    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('manajemen-akun-pengguna.index')->with('message', 'User berhasil dihapus.');
    }
}
