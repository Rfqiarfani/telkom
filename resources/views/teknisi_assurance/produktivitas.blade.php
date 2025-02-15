<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app_teknisi_assurance')

@section('title', 'Kegiatan')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Produktivitas</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Produktivitas Anda</h6>
            </div>
            <div class="card-body">
                <p>Di sini dapat mengelola produktivitas anda</p>
                <form action="" method='get'>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-4 mt-3">
                                            <label for="tanggal_awal" class="form-label">Tanggal Awal:</label>
                                            <input type="date" value="<?= $_GET['tanggal_awal'] ?? ''; ?>"
                                                name="tanggal_awal" id="tanggal_awal" class="form-control" required>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="tanggal_akhir" class="form-label">Tanggal Akhir:</label>
                                            <input type="date" value="<?= $_GET['tanggal_akhir'] ?? ''; ?>" name="tanggal_akhir"
                                                id="tanggal_akhir" class="form-control" required>
                                        </div>
                                        <div class="col-md-4 mt-3 d-flex align-items-end">
                                            <button id="filter_button" type="submit"
                                                class="btn btn-primary w-100">Filter</button>
                                        </div>
                                    </div>
                      </form>

                      <br>
                <!-- Button trigger modal -->
                <div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Grand Total</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Poin</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<!-- <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                            <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar"
                                    style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div> -->

  <!-- Pending Requests Card Example -->
  <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Produktivitas</h5>
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
      <option>saputra</option>
      <option>madani</option>
      <option>adam</option>
      <option>zaini</option>
      <option>amat</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Status</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>pilih status</option>
      <option>sukses</option>
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
                                <th>Tanggal</th>
                                <th>No Order</th>
                                <th>Jenis WO</th>
                                <th>Status</th>
                                <th>Point</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $value)
                          <tr>
                                <th>{{$value->tanggal}}</th>
                                <th>{{$value->no_order}}</th>
                                <th>{{$value->jenis_wo}}</th>
                                <th>
                                  @if ($value->status=="sukses")
                                  <span class="badge badge-pill badge-success">{{$value->status}}</span>
                                  @elseif ($value->status=="kendala")
                                  <span class="badge badge-pill badge-danger">{{$value->status}}</span>
                                  @endif
                                </th>
                                <th class="text-success">+{{$value->point}}</th>
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

