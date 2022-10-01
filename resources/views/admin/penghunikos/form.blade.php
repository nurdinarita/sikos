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
        <h2>Tambah Data Penghuni "{{ !isset($penghuni_kos) ? $kos->namakos : $penghuni_kos->kos->namakos }}"</h2>
        <div class="row my-3">
            <div class="col-xl-6">
                <form action="{{ !isset($penghuni_kos) ? url('penghuni-kos/'.$kos->id.'/create') : url('penghuni-kos/'.$penghuni_kos->id.'/update') }}" method="post">
                    @csrf
                    <div class="my-1">
                        <label for="nama_penghuni">Nama Penghuni</label>
                        <input type="text" name="nama" id="nama_penghuni" class="form-control" placeholder="Nama Penghuni Kos" value="{{ isset($penghuni_kos) ? $penghuni_kos->nama : old('nama') }}" required>
                    </div>
                    <div class="my-1">
                        <label for="no_hp">No HP</label>
                        <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="No HP" value="{{ isset($penghuni_kos) ? $penghuni_kos->no_hp : old('no_hp') }}" required>
                    </div>
                    <div class="my-1">
                        <label for="nama_kamar">Nama Kamar</label>
                        <input type="text" name="nama_kamar" id="nama_kamar" class="form-control" placeholder="Nama Kamar" value="{{ isset($penghuni_kos) ? $penghuni_kos->nama_kamar : old('nama_kamar') }}" required>
                    </div>
                    <div class="my-1">
                        <label for="tanggal_mulai_sewa">Tanggal Mulai Sewa</label>
                        <input type="date" name="tanggal_mulai_sewa" id="tanggal_mulai_sewa" class="form-control" placeholder="Tanggal Mulai Sewa" value="{{ isset($penghuni_kos) ? $penghuni_kos->tanggal_mulai_sewa : old('tanggal_mulai_sewa') }}" required>
                    </div>
                    <div class="my-1">
                        <label for="tanggal_akhir_sewa">Tanggal Akhir Sewa</label>
                        <input type="date" name="tanggal_akhir_sewa" id="tanggal_akhir_sewa" class="form-control" placeholder="Tanggal Akhir Sewa" value="{{ isset($penghuni_kos) ? $penghuni_kos->tanggal_akhir_sewa : old('tanggal_akhir_sewa') }}" required>
                    </div>

                    <div class="my-1">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
    {{-- <!-- Footer Start -->
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
    <!-- Footer End --> --}}
</div>
<!-- Content End -->   
@endsection