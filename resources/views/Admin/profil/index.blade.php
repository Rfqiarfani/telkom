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
                <div class="col-md-9 align-middle">
                    <table class="table table-borderless">
                        <tr>
                            <th width="150">Nama</th>
                            <td>: Budi Santoso
                                <a href="#" class="text-primary ml-2" title="Edit Nama" data-toggle="modal"
                                    data-target="#editNamaModal" style="text-decoration: none;">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>: 123456789
                                <a href="#" class="text-primary ml-2" title="Edit NIK" data-toggle="modal"
                                    data-target="#editNikModal" style="text-decoration: none;">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    </table>
                    <!-- Modal Edit Nama -->
                    <div class="modal fade" id="editNamaModal" tabindex="-1" aria-labelledby="editNamaModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editNamaModalLabel">Edit Nama</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" value="Budi Santoso">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit nik -->
                    <div class="modal fade" id="editNikModal" tabindex="-1" aria-labelledby="editNikModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editNamaModalLabel">Edit Nama</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="nama">NIK</label>
                                            <input type="text" class="form-control" id="nama" value="12345678">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


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