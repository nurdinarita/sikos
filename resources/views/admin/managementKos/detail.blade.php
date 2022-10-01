@extends('admin.layouts.main')

@section('content')
<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <form class="d-none d-md-flex ms-4">
            {{-- <input class="form-control border-0" type="search" placeholder="Search"> --}}
        </form>
        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="{{ url('admin/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    {{-- <a href="#" class="dropdown-item">My Profile</a> --}}
                    <a href="#!" type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ubahPassword">Ubah Password</a>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Log Out</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <div class="container-fluid pt-4 px-4">
        <h2>Detail Kos</h2>
        <div class="row my-3">
            <div class="col-xl-12">
                <a href="{{ url('management-kos') }}" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <img src="{{ asset('storage/gambar-kos/'.$kos->gambarkos) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $kos->namakos }}</h5>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">Perbulan Rp. {{ number_format($kos->hargaperbulan,2,',','.') }}</li>
                        <li class="list-group-item">Pertahun Rp. {{ number_format($kos->hargapertahun,2,',','.') }}</li>
                        <li class="list-group-item">Jumlah Kamar : <br> {{ $kos->jumlahkamar }}</li>
                        <li class="list-group-item">Kos Khusus : <br> {{ $kos->koskhusus == 1 ? 'Cowok' : 'Cewek' }}</li>
                        <li class="list-group-item">No HP Pemilik : <br> {{ $kos->nohppemilik }}</li>
                        <li class="list-group-item">
                        Fasilitas : <br>
                            <textarea class="form-control" rows="5" readonly>{{  $kos->fasilitas  }}</textarea>
                        </li>
                        <li  class="list-group-item">
                        Alamat : <br>
                            <textarea class="form-control" rows="5" readonly>{{ $kos->alamat }}</textarea>   
                        </li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="col-12 col-sm-6 text-center text-sm-start">
                    &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                </div>
                <div class="col-12 col-sm-6 text-center text-sm-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                </br>
                Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
</div>
<!-- Content End -->   
@endsection