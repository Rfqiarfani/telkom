<!-- resources/views/admin/assurance/index.blade.php -->

@extends('layouts.app')

@section('title', 'Assurance')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Biodata</h1>

    <!-- Card Profil -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Diri</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Kolom Foto Profil -->
                <div class="col-md-3 text-center">
                    <img src="/img/fotogoogle.jpeg" class="rounded-circle img-thumbnail" alt="Foto Profil">
                </div>

                <!-- Kolom Data Diri -->
                <div class="col-md-9">
                    <table class="table table-borderless">
                        <tr>
                            <th width="150">Nama</th>
                            <td>: Budi Santoso</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>: 123456789</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: budi.santoso@email.com</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: Jl. Mawar No. 123, Banjarmasin</td>
                        </tr>
                    </table>
                </div>
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
        "order": [
            [2, 'asc']
        ] // Urutkan berdasarkan kolom kedua (Nama) secara ascending
    });
    $('#dataTable2').DataTable({
        "paging": true, // Aktifkan pagination DataTables
        "lengthChange": true, // Izinkan pengguna untuk mengubah jumlah item per halaman
        "searching": true, // Izinkan pencarian
        "ordering": true, // Izinkan pengurutan kolom
        "info": true, // Tampilkan informasi tentang jumlah item
        "autoWidth": false, // Nonaktifkan lebar otomatis
        "order": [
            [2, 'asc']
        ] // Urutkan berdasarkan kolom kedua (Nama) secara ascending
    });
});
</script>
@endsection