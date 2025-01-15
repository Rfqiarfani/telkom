<!-- resources/views/admin/provisioning/index.blade.php -->

@extends('layouts.app')

@section('title', 'Provisioning')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Provisioning</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manajemen Provisioning</h6>
            </div>
            <div class="card-body">
                <p>Di sini Anda dapat mengelola provisioning.</p>
                <!-- Tambahkan tabel atau daftar provisioning di sini -->
            </div>
        </div>
    </div>
@endsection


<style>

.pagination {
    justify-content: center; /* Memusatkan pagination */
}

.pagination .page-item {
    margin: 0 5px; /* Menambahkan jarak antar item */
}

.pagination .page-link {
    padding: 0.5rem 0.75rem; /* Mengatur padding untuk link */
    font-size: 0.9rem; /* Mengatur ukuran font */
}

</style>
