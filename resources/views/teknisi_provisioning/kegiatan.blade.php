<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app_teknisi_provisioning')

@section('title', 'Kegiatan')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Kegiatan</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kegiatan Anda</h6>
        </div>
        <div class="card-body">
            <p>Di sini Anda dapat mengelola kegiatan anda.</p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                Tambah Kegiatan
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kegiatan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/teknisi_provisioning/tambahkegiatan" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal</label>
                                    <input name="tanggal" type="date" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">No Order</label>
                                    <input name="no_order" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Jenis WO</label>
                                    <select name="jenis_wo" class="form-control" id="exampleFormControlSelect1">
                                        <option>pilih jenis wo</option>
                                        <option>digipos</option>
                                        <option>dismant</option>
                                        <option>expand</option>
                                        <option>indibiz</option>
                                        <option>mo</option>
                                        <option>orbit</option>
                                        <option>pda</option>
                                        <option>stb</option>
                                        <option>datin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Status</label>
                                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                                        <option>pilih status</option>
                                        <option>sukses</option>
                                        <option>pending</option>
                                        <option>kendala</option>
                                    </select>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>No Order</th>
                            <th>Jenis WO</th>
                            <th>Status</th>
                            <th>Status Approve</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $data as $value)
                        <tr>
                            <th>{{$value->name}}</th>
                            <th>{{$value->tanggal}}</th>
                            <th>{{$value->no_order}}</th>
                            <th>{{$value->jenis_wo}}</th>
                            <th>
                                @if ($value->status=="sukses")
                                <span class="badge badge-pill badge-success">{{$value->status}}</span>
                                @elseif ($value->status=="pending")
                                <span class="badge badge-pill badge-warning">{{$value->status}}</span>
                                @elseif ($value->status=="kendala")
                                <span class="badge badge-pill badge-danger">{{$value->status}}</span>
                                @endif
                            </th>
                            <th>{{$value->status_approve}}</th>
                            <th>
                                <button data-toggle="modal" data-target="#editModal{{$value->id_kegiatan}}"
                                    class="btn btn-warning btn-sm">edit</button>
                                <div class="modal fade" id="editModal{{$value->id_kegiatan}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">edit kegiatan</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/teknisi_provisioning/editkegiatan" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tanggal</label>
                                                        <input value="{{$value->tanggal}}" name="tanggal" type="date"
                                                            class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">No Order</label>
                                                        <input value="{{$value->no_order}}" name="no_order" type="text"
                                                            class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Jenis WO</label>
                                                        <select name="jenis_wo" class="form-control"
                                                            id="exampleFormControlSelect1">
                                                            <option>pilih jenis wo</option>
                                                            <option>digipos</option>
                                                            <option>dismant</option>
                                                            <option>ekspan</option>
                                                            <option>indibiz</option>
                                                            <option>mo</option>
                                                            <option>orbit</option>
                                                            <option>pda</option>
                                                            <option>stb mig</option>
                                                            <option>datin</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Status</label>
                                                        <select name="status" class="form-control"
                                                            id="exampleFormControlSelect1">
                                                            <option>pilih status</option>
                                                            <option>sukses</option>
                                                            <option>pending</option>
                                                            <option>kendala</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-success">Update</button>
                                                    <input type="hidden" name="id_kegiatan"
                                                        value="{{$value->id_kegiatan}}">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <button data-toggle="modal" data-target="#hapusModal{{$value->id_kegiatan}}"
                                    class="btn btn-danger btn-sm">hapus</button>
                                <div class="modal fade" id="hapusModal{{$value->id_kegiatan}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">konfirmasi hapus kegiatan
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/teknisi_provisioning/hapuskegiatan" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    apakah anda yakin ingin menghapus kegiatan ini
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-success">Ya</button>
                                                    <input type="hidden" name="id_kegiatan"
                                                        value="{{$value->id_kegiatan}}">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Tidak</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </th>
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
        "order": [
            [2, 'asc']
        ] // Urutkan berdasarkan kolom kedua (Nama) secara ascending
    });
});
</script>
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
        "order": [
            [2, 'asc']
        ]
    });

    // Validasi Form Tambah Kegiatan
    $('form').on('submit', function(e) {
        let valid = true;
        let errorMessage = "";

        let tanggal = $('input[name="tanggal"]').val();
        let no_order = $('input[name="no_order"]').val();
        let jenis_wo = $('select[name="jenis_wo"]').val();
        let status = $('select[name="status"]').val();

        if (!tanggal || !no_order || jenis_wo === "pilih jenis wo" || status === "pilih status") {
            valid = false;
            errorMessage = "Silakan lengkapi semua data sebelum mengirim.";
        }

        if (!valid) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: errorMessage
            });
        }
    });
});
</script>
@endsection