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
        <h2>Penghuni Kos</h2>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row my-3">
            <div class="col-xl-12">
                <a href="{{ url('penghuni-kos') }}" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                @if($kos->jumlahkamar - $penghuni_kos->count() != 0)
                <a href="{{ url('penghuni-kos/'.$kos_id.'/create') }}" class="btn btn-primary btn-sm mb-2">Tambah Data</a>
                @endif
                <div class="card">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Penghuni</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Nama Kamar</th>
                            <th scope="col">Tanggal Mulai Sewa</th>
                            <th scope="col">Tanggal Akhir Sewa</th>
                            <th scope="col">Status Pembayaran</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($penghuni_kos as $penghuni)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $penghuni->nama }}</td>
                            <td>{{ $penghuni->no_hp }}</td>
                            <td>{{ $penghuni->nama_kamar }}</td>
                            <td>{{ $penghuni->tanggal_mulai_sewa }}</td>
                            <td>{{ $penghuni->tanggal_akhir_sewa }}</td>
                            <td>
                                {{-- <a href="{{ url('penghuni-kos/'.$penghuni->id.'/update-pembayaran') }}" class="btn btn-{{ $penghuni->status == 0 ? 'danger' : 'success' }} btn-sm">{{ $penghuni->status == 0 ? 'Belum Dibayar' : 'Lunas' }}</a> --}}
                                <button type="button" class="btn btn-{{ $penghuni->status == 0 ? 'danger' : 'success' }} btn-sm" data-bs-toggle="{{ $penghuni->status == 0 ? 'modal' : '' }}" data-bs-target="#updatePembayaran" data-url="{{ url('penghuni-kos/'.$penghuni->id.'/update-pembayaran') }}">{{ $penghuni->status == 0 ? 'Belum Dibayar' : 'Lunas' }}</button>
                            </td>
                            <td>
                                <a href="{{ url('penghuni-kos/'.$penghuni->id.'/edit') }}" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-url="{{ url('penghuni-kos/'.$penghuni->id.'/delete') }}"><i class="fas fa-trash"></i></button>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
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
                    <!--/*** This template is free as long as you keep the footer author???s credit link/attribution link/backlink. If you'd like to use the template without the footer author???s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
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

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Yakin ingin menghapus data?</p>
        </div>
        <div class="modal-footer">
            <form action="" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm">Ya, Hapus</button>
            </form>
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="updatePembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post" id="formtanggalbayar">
                @csrf
                <div class="my-2">
                    <label for="tanggalbayar">Pilih Tanggal Bayar</label>
                    <input type="date" name="tanggalbayar" id="tanggalbayar" class="form-control" placeholder="Tanggal Pembayaran" required>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Ya, Sudah Dibayar</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
</div>

<script>
    var deleteModal = document.getElementById('deleteModal')
    deleteModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget

    var url = button.getAttribute('data-url')
    var urlInput = deleteModal.querySelector('form')
    urlInput.setAttribute("action", url)
  })

    var updatePembayaran = document.getElementById('updatePembayaran')
    updatePembayaran.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget

    var url = button.getAttribute('data-url')
    var urlInput = updatePembayaran.querySelector('form#formtanggalbayar')
    urlInput.setAttribute("action", url)
  })
</script>
@endsection