<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app_teknisi_assurance')

@section('title', 'Kegiatan')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Riwayat</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Riwayat Anda</h6>
            </div>
            <div class="card-body">
                <p>Di sini Anda dapat mengelola Riwayat anda.</p>
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
  Tambah Riwayat
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Riwayat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
  <div class="form-group">
    <label for="exampleInputEmail1">No Order</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Jenis WO</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>pilih jenis wo</option>
      <option>digipos</option>
      <option>dismant</option>
      <option>ekspan</option>
      <option>indibiz</option>
      <option>mo</option>
      <option>orbit</option>
      <option>pda</option>
      <option>stb mig</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Status</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>pilih status</option>
      <option>sukses</option>
      <option>pending</option>
      <option>kendala</option>
    </select>

  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Jenis WO</th>
                                <th>Status</th>
                                <th>Status Approve</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
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

