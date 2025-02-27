@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

        <!-- Ringkasan Statistik -->
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-body text-center">
                        <h5 class="text-primary">Total Teknisi</h5>
                        <h3 id="totalTeknisi" class="font-weight-bold">0</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-body text-center">
                        <h5 class="text-success">Total Order</h5>
                        <h3 id="totalOrder" class="font-weight-bold">0</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-body text-center">
                        <h5 class="text-danger">Rata-rata Poin</h5>
                        <h3 id="avgPoint" class="font-weight-bold">0</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Statistik Teknisi -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Total Order & Poin per Teknisi</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="chartKegiatan"></canvas>
                        <p id="loadingBarChart" class="text-center mt-3">Loading...</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Persentase Jenis Order</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="chartJenisOrder"></canvas>
                        <p id="loadingPieChart" class="text-center mt-3">Loading...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch("{{ url('/dashboard/statistik') }}")
                .then(response => response.json())
                .then(data => {
                    if (!data.length) {
                        document.getElementById("loadingBarChart").innerText = "No Data Available";
                        document.getElementById("loadingPieChart").innerText = "No Data Available";
                        return;
                    }

                    let labels = data.map(d => {
                        let nameParts = d.name.split(" ");
                        if (nameParts.length === 1) {
                            return nameParts[0]; // Jika hanya 1 kata, pakai itu saja
                        } else if (nameParts.length === 2) {
                            return nameParts[1]; // Jika 2 kata, ambil kata terakhir
                        } else {
                            return nameParts[Math.floor(nameParts.length /
                            2)]; // Jika lebih dari 2 kata, ambil tengahnya
                        }
                    });


                    let totalOrder = data.map(d => d.total_order);
                    let totalPoint = data.map(d => d.total_point || 0); // Pastikan tidak ada null

                    let totalTeknisi = data.length;
                    let sumOrder = totalOrder.reduce((a, b) => a + b, 0);
                    let sumPoint = totalPoint.reduce((a, b) => a + b, 0);
                    let avgPoint = totalTeknisi > 0 ? (sumPoint / totalTeknisi).toFixed(2) : 0; // Cegah NaN

                    // Tampilkan di UI
                    document.getElementById("totalTeknisi").innerText = totalTeknisi;
                    document.getElementById("totalOrder").innerText = sumOrder;
                    document.getElementById("avgPoint").innerText = avgPoint;


                    document.getElementById("loadingBarChart").style.display = "none";

                    new Chart(document.getElementById("chartKegiatan"), {
                        type: "bar",
                        data: {
                            labels: labels,
                            datasets: [{
                                    label: "Total Order",
                                    data: totalOrder,
                                    backgroundColor: "rgba(54, 162, 235, 0.5)",
                                    borderColor: "rgba(54, 162, 235, 1)",
                                    borderWidth: 1
                                },
                                {
                                    label: "Total Poin",
                                    data: totalPoint,
                                    backgroundColor: "rgba(255, 99, 132, 0.5)",
                                    borderColor: "rgba(255, 99, 132, 1)",
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    // Hitung jenis order untuk Pie Chart
                    let jenisOrderLabels = ["DATIN", "DIGIPOS", "EKSPAN", "INDIBIZ", "PDA", "MO", "ORBIT",
                        "STB", "DISMANT"
                    ];
                    let jenisOrderData = jenisOrderLabels.map(type => data.reduce((sum, d) => sum + (d[type
                        .toLowerCase()] || 0), 0));

                    document.getElementById("loadingPieChart").style.display = "none";

                    new Chart(document.getElementById("chartJenisOrder"), {
                        type: "pie",
                        data: {
                            labels: jenisOrderLabels,
                            datasets: [{
                                data: jenisOrderData,
                                backgroundColor: [
                                    "#007bff", "#28a745", "#dc3545", "#ffc107", "#17a2b8",
                                    "#fd7e14", "#6f42c1", "#e83e8c", "#6610f2"
                                ]
                            }]
                        },
                        options: {
                            responsive: true
                        }
                    });

                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                    document.getElementById("loadingBarChart").innerText = "Error loading data";
                    document.getElementById("loadingPieChart").innerText = "Error loading data";
                });
        });
    </script>
@endsection

<style>
    .card {
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: scale(1.03);
    }

    .card-header {
        background-color: #f8f9fa;
        font-weight: bold;
        text-align: center;
    }

    .card-body {
        padding: 20px;
    }

    .text-primary {
        color: #007bff !important;
    }

    .text-success {
        color: #28a745 !important;
    }

    .text-danger {
        color: #dc3545 !important;
    }
</style>
