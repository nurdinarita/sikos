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
        <h2>Tambah Data Kos</h2>
        <div class="row my-3">
            <div class="col-xl-6">
                <form action="{{ !isset($kos) ? url('management-kos') : url('management-kos/'.$kos->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($kos))
                        @method('put')
                    @endif
                    <div class="my-1">
                        <label for="namakos">Nama Kos</label>
                        <input type="text" name="namakos" id="namakos" class="form-control" placeholder="Nama Kos" value="{{ isset($kos) ? $kos->namakos : old('namakos') }}" required>
                    </div>
                    <div class="my-1">
                        <label for="namakos">Gambar Kos</label>
                        <input type="file" name="gambarkos" id="gambarkos" class="form-control" value="{{ isset($kos) ? '' : 'required' }}">
                    </div>
                    <div class="my-1">
                        <label for="hargaperbulan">Harga Perbulan</label>
                        <input type="number" name="hargaperbulan" id="hargaperbulan" class="form-control" placeholder="Harga Perbulan" value="{{ isset($kos) ? $kos->hargaperbulan : old('hargaperbulan') }}" required>
                    </div>
                    <div class="my-1">
                        <label for="hargapertahun">Harga Pertahun</label>
                        <input type="number" name="hargapertahun" id="hargapertahun" class="form-control" placeholder="Harga Pertahun" value="{{ isset($kos) ? $kos->hargapertahun : old('hargapertahun') }}" required>
                    </div>
                    <div class="my-1">
                        <label for="fotokos1">Jumlah Kamar</label>
                        <input type="number" name="jumlahkamar" id="jumlahkamar" class="form-control" value="{{ isset($kos) ? $kos->jumlahkamar : old('jumlahkamar') }}" required>
                    </div>
                    <div class="my-1">
                        <label for="fasilitas">Fasilitas</label>
                        <textarea name="fasilitas" id="fasilitas" class="form-control" rows="5" required>{{ isset($kos) ? $kos->fasilitas : old('fasilitas') }}</textarea>
                    </div>  
                    <div class="my-1">
                        <label for="koskhusus">Kos Khusus</label>
                        <select name="koskhusus" id="koskhusus" class="form-control" required>
                            <option value="1" {{ isset($kos) && $kos->koskhusus == 1 ? 'selected' : '' }}>Cowok</option>
                            <option value="2" {{ isset($kos) && $kos->koskhusus == 2 ? 'selected' : '' }}>Cewek</option>
                            {{-- <option value="3">Campur</option> --}}
                        </select>
                    </div>
                    {{-- <div class="my-1">
                        <label for="nohppemilik">No HP Pemilik</label>
                        <input type="number" name="nohppemilik" id="nohppemilik" class="form-control" placeholder="No HP Pemilik" value="{{ isset($kos) ? $kos->nohppemilik : old('nohppemilik') }}" required>
                    </div> --}}
                    <div class="my-1">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" rows="5" required>{{ isset($kos) ? $kos->alamat : old('alamat') }}</textarea>
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