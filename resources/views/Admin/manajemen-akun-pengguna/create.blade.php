@extends('layouts.app')

@section('title', 'Buat Akun Pengguna')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Buat Akun Pengguna</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Buat Akun Pengguna</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('manajemen-akun-pengguna.store') }}" method="POST" id="createUserForm">
                @csrf
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                <i class="fas fa-eye" id="eyeIcon"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="Admin">Admin</option>
                        <option value="Teknisi Provisioning">Teknisi Provisioning</option>
                        <option value="Teknisi Assurance">Teknisi Assurance</option>
                        <!-- Tambahkan role lain jika diperlukan -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" id="btnCreate">Buat Akun</button>
                <a href="{{ route('manajemen-akun-pengguna.index') }}" class="btn btn-secondary">Kembali</a>
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

            // Konfirmasi sebelum membuat akun
            $('#btnCreate').on('click', function(event) {
                event.preventDefault(); // Mencegah pengiriman form langsung

                Swal.fire({
                    title: "Apakah Anda yakin ingin membuat?",
                    text: "Data akan dibuat!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, simpan!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        let form = $('#createUserForm');
                        let formData = form.serialize(); // Ambil data dari form

                        $.ajax({
                            url: form.attr('action'),
                            type: "POST",
                            data: formData,
                            success: function(response) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: "Data berhasil dibuat.",
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    // Simpan session sebelum redirect
                                    sessionStorage.setItem('successMessage', "Your work has been saved");

                                    // Redirect ke halaman manajemen akun
                                    window.location.href = "{{ route('manajemen-akun-pengguna.index') }}";
                                });

                            },
                            error: function() {
                                Swal.fire("Error!", "Terjadi kesalahan saat menyimpan.", "error");
                            }
                        });
                    }
                });
            });

            // Menampilkan notifikasi setelah redirect
            if (sessionStorage.getItem('successMessage')) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: sessionStorage.getItem('successMessage'),
                    showConfirmButton: false,
                    timer: 1500
                });
                sessionStorage.removeItem('successMessage'); // Hapus session setelah ditampilkan
            }
        });
    </script>
@endsection
