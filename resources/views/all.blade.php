@include('layouts.header')
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="{{ url('/') }}">Home</a> / Semua</span>
    <h2><a href="{{ url('/') }}">Home</a> / Semua</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

  <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Cari Kos</h4>
    <input type="text" class="form-control" placeholder="Search of Properties">
    <div class="row">
            <div class="col-lg-5">
              <select class="form-control">
                <option>Buy</option>
                <option>Rent</option>
                <option>Sale</option>
              </select>
            </div>
            <div class="col-lg-7">
              <select class="form-control">
                <option>Price</option>
                <option>$150,000 - $200,000</option>
                <option>$200,000 - $250,000</option>
                <option>$250,000 - $300,000</option>
                <option>$300,000 - above</option>
              </select>
            </div>
          </div>

          <div class="row">
          <div class="col-lg-12">
              <select class="form-control">
                <option>Property Type</option>
                <option>Apartment</option>
                <option>Building</option>
                <option>Office Space</option>
              </select>
              </div>
          </div>
          <button class="btn btn-primary">Find Now</button>

  </div>



<div class="hot-properties hidden-xs">
<h4>Terakhir Diupdate</h4>
@foreach ($terbaru as $item)
<div class="row">
    <div class="col-lg-4 col-sm-5"><img src="{{ asset('storage/gambar-kos/'. $item->gambarkos) }}" class="img-responsive img-circle" alt="properties"></div>
    <div class="col-lg-8 col-sm-7">
        <h5><a href="{{ url($item->id.'/detail') }}">{{ $item->namakos }}</a></h5>
        <p class="price">Rp. {{ number_format($item->hargaperbulan,2,',','.') }}</p> </div>
</div>
@endforeach


</div>


</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<div class="pull-left result">Showing: 12 of 100 </div>
<div class="pull-right">
    <form action="sort-by" method="get">
    <select class="form-control">
    <option>Urut Berdasarkan</option>
    <option>Harga: Rendah ke Tinggi</option>
    <option>Harga: Tinggi ke Rendah</option>
</select>
</form>
</div>

</div>
<div class="row">

    @foreach($kos as $item)
     <!-- properties -->
      <div class="col-lg-4 col-sm-6">
      <div class="properties">
        <div class="image-holder"><img src="{{ asset('storage/gambar-kos/'. $item->gambarkos) }}" class="img-responsive" alt="properties">
          <div class="status {{ $item->status == 1 ? 'sold' : 'new' }}">{{ $item->status == 1 ? 'Tersedia' : 'Tidak Tersedia' }}</div>
        </div>
        <h4><a href="{{ url($item->id.'/detail') }}">{{ $item->namakos }}</a></h4>
        <p class="price">
            Harga Perbulan : <br>Rp. {{ number_format($item->hargaperbulan,2,',','.') }} <br>
            Harga Pertahun : <br> Rp. {{ number_format($item->hargapertahun,2,',','.') }} 
          </p>
        {{-- <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div> --}}
        <a class="btn btn-primary" href="{{ url($item->id.'/detail') }}">Detail</a>
      </div>
      </div>
      @endforeach
      <!-- properties -->

      <div class="center">
<ul class="pagination">
          <li><a href="#">«</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">»</a></li>
        </ul>
</div>

</div>
</div>
</div>
</div>
</div>

@include('layouts.footer')