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
                                        <a href="{{ route('manajemen-akun-pengguna.edit', $user) }}"
                                            class="btn btn-warning btn-sm">Edit</a>

                                        <!-- Tombol hapus dengan SweetAlert -->
                                        <button type="button" class="btn btn-danger btn-sm btn-delete"
                                            data-url="{{ route('manajemen-akun-pengguna.destroy', $user) }}"
                                            data-name="{{ $user->name }}">
                                            Hapus
                                        </button>
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
            let table = $('#dataTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "order": [
                    [2, 'asc']
                ]
            });

            $(document).on('click', '.btn-delete', function() {
                let deleteUrl = $(this).data('url');
                let userName = $(this).data('name');
                let tr = $(this).closest('tr'); // Simpan baris yang akan dihapus

                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Akun " + userName + " akan dihapus!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: deleteUrl,
                            type: "POST",
                            data: {
                                _method: "DELETE",
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Akun berhasil dihapus.",
                                    icon: "success"
                                }).then(() => {
                                    table.row(tr).remove().draw(); // Hapus baris dari DataTables
                                    $('form').trigger("reset"); // Reset semua form di halaman
                                });
                            },
                            error: function() {
                                Swal.fire("Error!", "Terjadi kesalahan saat menghapus.", "error");
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection

