@extends('layouts.app')

@section('title', 'Ekspor Laporan')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Ekspor Laporan</h1>
        <div class="alert alert-info">
            <strong>Informasi:</strong> Di sini Anda dapat mengekspor laporan dalam berbagai format dan memfilter laporan berdasarkan tim teknisi.
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ekspor Laporan</h6>
            </div>
            <div class="card-body">
                <p>Silakan pilih format yang diinginkan untuk mengekspor laporan:</p>

                <a href="{{ route('export-laporan.excel', ['role' => 'Teknisi Provisioning']) }}" class="btn btn-success">
                    <i class="fas fa-file-excel"></i> Ekspor Teknisi Provisioning
                </a>

                <a href="{{ route('export-laporan.excel', ['role' => 'Teknisi Assurance']) }}" class="btn btn-success">
                    <i class="fas fa-file-excel"></i> Ekspor Teknisi Assurance
                </a>
            </div>
        </div>

        <!-- Card Filter -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Filter Laporan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('export-laporan.index') }}" method="GET">
                    <div class="form-group">
                        <label for="team">Pilih Tim Teknisi:</label>
                        <select name="team" id="team" class="form-control">
                            <option value="">-- Semua Tim --</option>
                            <option value="Teknisi Provisioning" {{ request('team') == 'Teknisi Provisioning' ? 'selected' : '' }}>Teknisi Provisioning</option>
                            <option value="Teknisi Assurance" {{ request('team') == 'Teknisi Assurance' ? 'selected' : '' }}>Teknisi Assurance</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>

        <!-- Card Tabel Laporan -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Laporan {{ $team ?: 'Semua Tim' }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama Teknisi</th>
                                <th>Total Order</th>
                                <th>Total Poin</th>
                                 <th>Target Poin HI</th> {{-- harian --}}
                                <th>Target / Bulan (176)</th>
                                <th>Produktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->kegiatan->count() }}</td>
                                    <td>{{ $user->kegiatan->sum('point') }}</td>
                                    <td>{{ floor($user->kegiatan->sum('point') / 26) }}</td>
                                    <td>176</td>
                                    <td>
                                        @php
                                        $totalPoint = $user->kegiatan->sum('point');
                                        $totalHariKerja = 26; // Hari kerja dalam 1 bulan

                                        // Total poin harian
                                        $pointHarian = ceil($totalPoint / $totalHariKerja); // Pembulatan ke atas agar tidak hilang poin kecil

                                        if ($pointHarian >= 8) {
                                            $status = 'Tinggi';
                                            $color = 'success';
                                        } elseif ($pointHarian >= 1) {
                                            $status = 'Sedang';
                                            $color = 'warning';
                                        } else {
                                            $status = 'Rendah';
                                            $color = 'danger';
                                        }
                                    @endphp
                                    <span class="badge badge-{{ $color }}">{{ $status }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pesan jika data tidak ditemukan -->
                @if ($users->isEmpty())
                    <div class="alert alert-warning text-center mt-3">
                        <strong>Data tidak ditemukan!</strong> Pilih tim teknisi yang lain atau pastikan data sudah ada.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
