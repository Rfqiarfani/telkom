<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title', 'Admin - Dashboard')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('css/admin/sb-admin-2.min.css') }}">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.15.10/sweetalert2.min.js" integrity="sha512-M60HsJC4M4A8pgBOj7oC/lvJXuOc9CraWXdD4PF+KNmKl8/Mnz6AH9FANgi4SJM6D9rqPvgQt4KRFR1rPN+EUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="{{ route('admin.dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <div class="sidebar-heading">Divisi</div>
            <li class="nav-item {{ request()->routeIs('provisioning.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('provisioning.index') }}">
                    <i class="fas fa-cogs fa-fw"></i>
                    <span>Provisioning</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('assurance.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('assurance.index') }}">
                    <i class="fas fa-check fa-fw"></i>
                    <span>Assurance</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Manajemen</div>
            <li class="nav-item {{ request()->routeIs('manajemen-akun-pengguna.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('manajemen-akun-pengguna.index') }}">
                    <i class="fas fa-user fa-fw"></i>
                    <span>Manajemen Akun Pengguna</span>
                </a>
            </li>
            <!-- <li class="nav-item {{ request()->routeIs('manajemen-data-aktivitas.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('manajemen-data-aktivitas.index') }}">
                    <i class="fas fa-tasks fa-fw"></i>
                    <span>Manajemen Data Aktivitas</span>
                </a>
            </li> -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-tasks fa-fw"></i>
                    <span>Produktivitas</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Produktivitas</h6>
                        <a class="collapse-item"
                            href="{{ route('produktivitas.produktivitas_provisioning') }}">Provisioning</a>
                        <a class="collapse-item"
                            href="{{ route('produktivitas.produktivitas_assurance') }}">Assurance</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Lainnya</div>
            <li class="nav-item {{ request()->routeIs('export-laporan.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('export-laporan.index') }}">
                    <i class="fas fa-file-export fa-fw"></i>
                    <span>Ekspor Laporan</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-fw"></i>
                    <span>Keluar</span>
                </a>
            </li>
        </ul>



        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar -expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle Button -->
                    <button id="sidebarToggle"
                        class="btn btn-primary d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/admin/profil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Main Content Area -->
                <div class="container-fluid">
                    @yield('content')
                    <!-- Konten dari halaman lain akan dimasukkan di sini -->
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin mau keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih “Keluar” di bawah ini jika Anda siap untuk mengakhiri sesi saat ini.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <button class="btn btn-danger" type="button"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Notifikasi Selamat Datang -->

    <style>
        #welcome-message {

            position: fixed;

            bottom: 20px;

            right: 20px;

            z-index: 9999;

            width: auto;

            max-width: 300px;

            transition: opacity 0.5s ease;

        }
    </style>


    @if (session('message'))
        <div class="alert alert-success" id="welcome-message">

            {{ session('message') }}

        </div>
    @endif


    <script>
        const welcomeMessage = document.getElementById('welcome-message');

        if (welcomeMessage) {

            setTimeout(() => {

                welcomeMessage.style.opacity = '0';

                setTimeout(() => {

                    welcomeMessage.style.display = 'none';

                }, 500);

            }, 5000);

        }
    </script>




    <style>
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            min-width: 10rem;
            padding: 0.5rem 0;
            margin: 0;
            font-size: 1rem;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 0.25rem;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .navbar .dropdown-menu {
            z-index: 1050;
            /* Pastikan lebih tinggi dari sidebar */
            position: absolute;
            right: 0;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    @yield('scripts')
    <!-- Menambahkan section untuk skrip halaman -->

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
