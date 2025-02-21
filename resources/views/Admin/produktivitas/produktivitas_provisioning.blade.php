<!-- resources/views/admin/provisoning/index.blade.php -->

@extends('layouts.app')

@section('title', 'Provisioning')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Provisioning</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Produktivitas</h6>
        </div>

        <div class="card-body">
            <form action="" method='get'>
                <div class="row d-flex align-items-end">
                    <div class="col-md-4 mt-3">
                        <label for="tanggal_awal" class="form-label">Tanggal Awal:</label>
                        <input type="date" value="<?= $_GET['tanggal_awal'] ?? ''; ?>" name="tanggal_awal"
                            id="tanggal_awal" class="form-control" required>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="tanggal_akhir" class="form-label">Tanggal Akhir:</label>
                        <input type="date" value="<?= $_GET['tanggal_akhir'] ?? ''; ?>" name="tanggal_akhir"
                            id="tanggal_akhir" class="form-control" required>
                    </div>
                    <div class="col-md-4 mt-3 d-flex align-items-end">
                        <button id="filter_button" type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </div>
            </form>

            <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @foreach ($users as $value)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$value->nik}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->total_point}}</td>
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
        "order": [] // Urutkan berdasarkan kolom kedua (Nama) secara ascending
    });
    $('#dataTable2').DataTable({
        "paging": true, // Aktifkan pagination DataTables
        "lengthChange": true, // Izinkan pengguna untuk mengubah jumlah item per halaman
        "searching": true, // Izinkan pencarian
        "ordering": true, // Izinkan pengurutan kolom
        "info": true, // Tampilkan informasi tentang jumlah item
        "autoWidth": false, // Nonaktifkan lebar otomatis
        "order": [] // Urutkan berdasarkan kolom kedua (Nama) secara ascending
    });
});
</script>
@endsection
