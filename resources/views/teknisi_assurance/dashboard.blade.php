<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app_teknisi_assurance')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
        <!-- Konten dashboard Anda di sini -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
            </div>
            <div class="card-body">
                <p>Welcome, {{session('name')}}</p>
            </div>
        </div>
    </div>
@endsection
