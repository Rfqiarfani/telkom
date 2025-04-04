<!-- resources/views/admin/Provisioning/index.blade.php -->

@extends('layouts.app')

@section('title', 'Provisioning')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Provisioning</h1>
        <!-- Konten dashboard Anda di sini -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Provisioning</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Jenis WO</th>
                                <th>Status</th>
                                <th>Status Approve</th>
                                <th>Point</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                                <tr>
                                    <td>{{ $value->no_order }}</td>
                                    <td>{{ $value->tanggal }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->jenis_wo }}</td>
                                    <td>
                                        @if ($value->status == 'sukses')
                                            <span class="badge badge-pill badge-success">{{ $value->status }}</span>
                                        @elseif ($value->status == 'kendala')
                                            <span class="badge badge-pill badge-danger">{{ $value->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $value->status_approve }}</td>
                                    @if ($value->status == 'sukses' && $value->status_approve == 'Disetujui')
                                        @if (in_array($value->jenis_wo, ['datin', 'digipos', 'expand', 'indibiz', 'pda']))
                                            <td class="text-success">+4</td>
                                        @elseif (in_array($value->jenis_wo, ['mo', 'orbit', 'stb', 'dismant']))
                                            <td class="text-success">+2</td>
                                        @else
                                            <td class="text-success">+0</td>
                                        @endif
                                    @elseif ($value->status == 'kendala')
                                        <td class="text-danger">+0</td>
                                    @elseif ($value->status == 'sukses' && $value->status_approve == 'Ditolak')
                                        <td class="text-success">-</td>
                                    @else
                                        <td class="text-success">-</td>
                                    @endif
                                    <td>
                                        @if ($value->status_approve == 'Menunggu')
                                            <button class="btn btn-success btn-circle" data-toggle="modal"
                                                data-target="#exampleModal{{ $value->id_kegiatan }}">
                                                <i class="fas fa-check"></i>
                                            </button>

                                            <button class="btn btn-danger btn-circle" data-toggle="modal"
                                                data-target="#tolak{{ $value->id_kegiatan }}">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        @else
                                            -
                                        @endif
                                        <div class="modal fade" id="exampleModal{{ $value->id_kegiatan }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Aktivitas
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/admin/setujukegiatanprovisioning" method="post">
                                                        @csrf
                                                        <div class="modal-body">

                                                            <p>Apakah Anda Yakin Menyetujui Aktivitas Ini?</p>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <input type="hidden" name="id_kegiatan"
                                                                value="{{ $value->id_kegiatan }}">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- tolak -->
                                        <div class="modal fade" id="tolak{{ $value->id_kegiatan }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Aktivitas
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/admin/tolakkegiatanprovisioning" method="post">
                                                        @csrf
                                                        <div class="modal-body">

                                                            <p>Apakah Anda Yakin Ingin Menolak?</p>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <input type="hidden" name="id_kegiatan"
                                                                value="{{ $value->id_kegiatan }}">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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
