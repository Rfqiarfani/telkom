@extends('layouts.app')

@section('title', 'Manajemen Akun Pengguna')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Manajemen Akun Pengguna</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Akun Pengguna</h6>
            </div>
            <div class="card-body">
                <p>Di sini Anda dapat mengelola akun Pengguna.</p>
                <a href="{{ route('manajemen-akun-pengguna.create') }}" class="btn btn-primary mb-3">Buat Akun Pengguna</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->nik }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="{{ route('manajemen-akun-pengguna.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('manajemen-akun-pengguna.destroy', $user) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "paging": true, // Aktifkan pagination DataTables
                "lengthChange": true, // Izinkan pengguna untuk mengubah jumlah item per halaman
                "searching": true, // Izinkan pencarian
                "ordering": true, // Izinkan pengurutan kolom
                "info": true, // Tampilkan informasi tentang jumlah item
                "autoWidth": false, // Nonaktifkan lebar otomatis
                "order": [[2, 'asc']] // Urutkan berdasarkan kolom kedua (Nama) secara ascending
            });
        });
    </script>
@endsection
