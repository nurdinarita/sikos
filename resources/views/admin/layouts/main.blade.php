<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Management Kos</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ url('/') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">Management Kos</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('admin/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                        <span>Pemilik Kos</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ url('/dashboard') }}" class="nav-item nav-link {{ $active == 'Dashboard' ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ url('management-kos') }}" class="nav-item nav-link {{ $active == 'Management Kos' ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Management Kos</a>
                    <a href="{{ url('penghuni-kos') }}" class="nav-item nav-link {{ $active == 'Penghuni Kos' ? 'active' : '' }}"><i class="fa fa-users me-2"></i>Penghuni Kos</a>
                    <a href="{{ url('riwayat-pembayaran') }}" class="nav-item nav-link {{ $active == 'Riwayat Pembayaran' ? 'active' : '' }}"><i class="fas fa-money-bill-alt me-2"></i>R. Pembayaran</a>
                    <a href="{{ url('profil') }}" class="nav-item nav-link {{ $active == 'Profil' ? 'active' : '' }}"><i class="fas fa-user me-2"></i>Profil</a>
                    <a href="#!" type="button" class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#ubahPassword"><i class="fas fa-key me-2"></i>Ubah Password</a>
                    {{-- <button type="button" class="btn nav-item nav-link" data-bs-toggle="modal" data-bs-target="#ubahPassword"><i class="fas fa-key me-2"></i>Ubah Password</button> --}}
                    {{-- <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div> --}}
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        @yield('content')


        <!-- Back to Top -->
        {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> --}}
    </div>

    <!-- Ubah Password Modal -->
    <div class="modal fade" id="ubahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5>Ubah Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ 'ubah-password' }}" method="post">
                <div class="mb-2">
                    <label for="passwordlama">Password Lama</label>
                    <input type="password" name="passwordlama" id="passwordlama" placeholder="Masukkan Password Lama" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label for="passwordbaru">Password Baru</label>
                    <input type="password" name="passwordbaru" id="passwordbaru" placeholder="Masukkan Password Baru" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label for="konfirmasipassword">Konfirmasi Password Baru</label>
                    <input type="password" name="konfirmasipassword" id="konfirmasipassword" placeholder="Masukkan Password Baru" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Ubah Password</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>
    @section('script')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('admin/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('admin/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('admin/js/main.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
</body>

</html>