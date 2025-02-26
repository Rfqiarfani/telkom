<!-- resources/views/admin/assurance/index.blade.php -->

@extends('layouts.app')

@section('title', 'Assurance')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Assurance</h1>

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
    var table = $('#dataTable2').DataTable({
        "paging": true, // Aktifkan pagination DataTables
        "lengthChange": true, // Izinkan pengguna untuk mengubah jumlah item per halaman
        "searching": true, // Izinkan pencarian
        "ordering": true, // Izinkan pengurutan kolom
        "info": true, // Tampilkan informasi tentang jumlah item
        "autoWidth": false, // Nonaktifkan lebar otomatis
        "columnDefs": [
            {
                "targets": 0, // Kolom "No" (indeks 0)
                "orderable": false, // Nonaktifkan pengurutan untuk kolom "No"
                "render": function(data, type, row, meta) {
                    // Menghasilkan nomor urut dinamis
                    return meta.row + 1 + meta.settings._iDisplayStart;
                }
            },
            {
                "targets": 3, // Kolom "Point" (indeks 3)
                "orderData": [3], // Aktifkan pengurutan untuk kolom "Point"
                "type": "num" // Tentukan tipe data sebagai numerik
            }
        ],
        "order": [[3, "desc"]], // Urutkan kolom "Point" secara descending secara default
        "createdRow": function(row, data, dataIndex) {
            // Update nomor urut setiap kali baris dibuat
            var api = this.api();
            var pageInfo = api.page.info();
            var rowNumber = dataIndex + 1 + pageInfo.start;
            $('td:eq(0)', row).html(rowNumber);
        }
    });

    // Update nomor urut saat pengurutan atau pagination diubah
    table.on('order.dt search.dt', function() {
        table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
});
</script>
@endsection
