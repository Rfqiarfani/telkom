<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create'); // Pastikan view ini memiliki pilihan untuk role
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:users',
            'password' => 'required',
            'name' => 'required',
            'role' => 'required|in:Admin,Teknisi Provisioning,Teknisi Assurance', // Validasi role
        ]);

        User::create([
            'nik' => $request->nik,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User  created successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user')); // Pastikan view ini memiliki pilihan untuk role
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nik' => 'required|unique:users,nik,' . $user->id,
            'name' => 'required',
            'role' => 'required|in:Admin,Teknisi Provisioning,Teknisi Assurance', // Validasi role
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

        return redirect()->route('users.index')->with('success', 'User  updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User  deleted successfully.');
    }
}
