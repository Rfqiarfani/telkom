<!-- resources/views/admin/manajemen-akun-karyawan/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Akun Karyawan')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Akun Karyawan</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Akun Karyawan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('manajemen-akun-karyawan.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $user->nik }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password (kosongkan jika tidak ingin mengubah)</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Teknisi" {{ $user->role == 'Teknisi' ? 'selected' : '' }}>Teknisi</option>
                            <!-- Tambahkan role lain jika diperlukan -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Akun</button>
                    <a href="{{ route('manajemen-akun-karyawan.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
