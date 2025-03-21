@extends('layouts.app')

@section('title', 'Edit Akun Pengguna')

@section('content')

    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Akun Pengguna</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Akun Pengguna</h6>
            </div>

            <div class="card-body">
                <form id="editUserForm" action="{{ route('manajemen-akun-pengguna.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $user->nik }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password (kosongkan jika tidak ingin mengubah)</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password">
                            <div class="input-group-append">
                                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                    <i class="fas fa-eye" id="eyeIcon"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Teknisi Provisioning"
                                {{ $user->role == 'Teknisi Provisioning' ? 'selected' : '' }}>Teknisi Provisioning</option>
                            <option value="Teknisi Assurance" {{ $user->role == 'Teknisi Assurance' ? 'selected' : '' }}>
                                Teknisi Assurance</option>
                        </select>
                    </div>

                    <button type="button" class="btn btn-primary" id="btnUpdate">Update Akun</button>
                    <a href="{{ route('manajemen-akun-pengguna.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
    // Toggle password visibility
    $('#togglePassword').on('click', function() {
        const passwordInput = $('#password');
        const eyeIcon = $('#eyeIcon');
        const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
        passwordInput.attr('type', type);
        eyeIcon.toggleClass('fa-eye fa-eye-slash');
    });

    // Konfirmasi sebelum menyimpan perubahan
    $('#btnUpdate').on('click', function() {
        Swal.fire({
            title: "Apakah Anda yakin ingin menyimpan perubahan?",
            text: "Data akan diperbarui!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, simpan!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                $('#editUserForm').submit();
            }
        });
    });
});

    </script>
@endsection
