@include('layouts.header')
<div class="">
    

            <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
        
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-1"></div>
              <h2><a href="#">Mau Cari Kos?</a></h2>
              <blockquote>              
              <h1 class="">Dapatkan infonya disini.</h1>
              {{-- <p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p>
              <cite>$ 20,000,000</cite> --}}
              </blockquote>
            </div>
          </div>
        </div><!-- /sl-slider -->



        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </nav>

      </div><!-- /slider-wrapper -->
</div>



<div class="banner-search">
  <div class="container"> 
    <!-- banner -->
    <h3>Cari Kos</h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <input type="text" class="form-control" placeholder="Search of Properties">
          <div class="row">
            {{-- <div class="col-lg-3 col-sm-3 ">
              <select class="form-control">
                <option>Buy</option>
                <option>Rent</option>
                <option>Sale</option>
              </select>
            </div> --}}
            <div class="col-lg-3 col-md-3 col-sm-4">
              <select class="form-control">
                <option>Harga</option>
                <option>150.000 - 200.000</option>
                <option>200.000 - 250.000</option>
                <option>250.000 - 300.000</option>
                <option>300.000 - ...</option>
              </select>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
            <select class="form-control">
                <option>Kategori Kos</option>
                <option>Kos Cowok</option>
                <option>Kos Cewek</option>
              </select>
              </div>
              <div class="col-lg-3 col-sm-4">
              <button class="btn btn-success">Cari Kos</button>
              </div>
          </div>
          
          
        </div>
        <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <a href="{{ url('/login') }}" class="btn btn-info">Login</a>
          {{-- <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Login</button> --}}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer"> <a href="{{ url('all') }}" class="pull-right viewall">Tampilkan Semua</a>
    <h2>Terbaru</h2>
    <div id="owl-example" class="owl-carousel">

      @foreach($kos as $item)
      <div class="properties">
        <div class="image-holder"><img src="{{ asset('storage/gambar-kos/'. $item->gambarkos) }}" width="198px" height="135px">
          <div class="status {{ $item->status == 1 ? 'sold' : 'new' }}">{{ $item->status == 1 ? 'Tersedia' : 'Tidak Tersedia' }}</div>
        </div>
        <h4><a href="{{ url($item->id.'/detail') }}">{{ $item->namakos }}</a></h4>
        <p class="price">
          Harga Perbulan : <br>Rp. {{ number_format($item->hargaperbulan,2,',','.') }} <br>
          Harga Pertahun : <br> Rp. {{ number_format($item->hargapertahun,2,',','.') }} 
        </p>
        <div class="listing-detail">
          {{-- <span data-toggle="tooltip" data-placement="bottom" data-original-title="Tempat Tidur">	<i class='fas fa-bed'></i></span>
          <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span>
          <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span>
          <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> --}}
        </div>
        <a class="btn btn-primary" href="{{ url($item->id.'/detail') }}">Detail</a>
      </div>
      @endforeach
      
      
    </div>
  </div>
  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>Tentang Aplikasi</h3>
        <p>Aplikasi ini dibuat menggunakan framework bootstrap sebagai front end nya, dan menggunakan framwork laravel sebagai back end nya. Aplikasi ini dibuat agar dapat memudahkan masyarakat untuk mencari info kos-kosan khususnya di area Banda Aceh Dan Aceh Besar</p>
      
      </div>
      <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
        <h3>Terbaru</h3>
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">
            <div class="item active">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/1.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p>
                  <a href="property-detail.php" class="more">More Detail</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/2.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p>
                  <a href="property-detail.php" class="more">More Detail</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/3.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p>
                  <a href="property-detail.php" class="more">More Detail</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/4.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p>
                  <a href="property-detail.php" class="more">More Detail</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.footer')