@extends('layouts.app')

@section('title', 'Manajemen Akun Pengguna')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Manajemen Akun Pengguna</h1>
        <div class="alert alert-info">
            <strong>Informasi:</strong> Di sini Anda dapat mengelola akun pengguna.
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Akun Pengguna</h6>
            </div>
            <div class="card-body">
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
                                        <button type="button" class="btn btn-danger btn-sm btn-delete"
                                            data-url="{{ route('manajemen-akun-pengguna.destroy', $user) }}"
                                            data-name="{{ $user->name }}"
                                            data-toggle="modal"
                                            data-target="#confirmDeleteModal">
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

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="deleteMessage">Apakah Anda yakin ingin menghapus pengguna ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "order": [[2, 'asc']]
            });

            // Handle modal delete button click
            $('.btn-delete').click(function () {
                let deleteUrl = $(this).data('url');
                let userName = $(this).data('name');
                $('#deleteForm').attr('action', deleteUrl);
                $('#deleteMessage').text('Apakah Anda yakin ingin menghapus pengguna "' + userName + '"?');
            });
        });
    </script>
@endsection
