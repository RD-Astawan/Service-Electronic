@extends('layouts/master_2')
@section('main')
  <main id="main">
    <!-- ====== Whatsap Icon ====== -->
    <a  class="whats-app" href="https://wa.link/5ntmnh" target="_blank">
      <i class="bi bi-whatsapp my-float"></i>
    </a>
     <!-- ======= Beranda Section ======= -->
     <div id="beranda" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="row text-center">
            <div class="row">
              @foreach ($data as $item)
                <div class="col-md-4">
                  <div class="card" style="min-height: 450px;">
                    <img class="card-img-top" src="{{ asset('storage/'.$item->gambar) }}" alt="Card image cap" width="214" height="140">
                    <div class="card-body"><br>
                      <h6 class="card-title"><b>{{ $item->judul }}</b></h6><hr>
                      <p class="card-text">{{ $item->deskripsi }}</p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
        </div>
        </div>
      </div>
    </div><!-- End Beranda Section -->

    @foreach ($profile as $item)
    <!-- ======= Profile Section ======= -->
    <div id="profil" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h3>{{ $item->judul }}</h3>
            </div>
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="well-left">
              <div class="single-well">
                <div class="box">
                <a href="#">
                  <img src="{{ asset('storage/'.$item->gambar) }}" class="box_img" width = "300" height = "300" alt="">
                </a>
            </div>
              </div>
            </div>
          </div>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="well-middle">
              <div class="single-well" style="text-align: justify">
                <p>
                    {{ $item->deskripsi }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Profile Section -->
    @endforeach

    <!-- ======= Tracking Section ======= -->
    <div id="tracking" class="services-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h3>Tracking Proses Perbaikan</h3>
            </div>
          </div>
        </div><br>
        <p style="text-align: center">
            Wahyu Service Elektronik memberikan fitur tracking proses perbaikan kepada customer.
             Customer dapat melihat sampai mana proses perbaikan yang telah dilakukan oleh pihak 
             Wahyu Service Elektronik terhadap barang elektronik/handphone yang dimiliki oleh user
        </p>
        <div class="row text-center">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6 offset-3">
            <div class="input-group">
                <input id="search-input" type="search" class="form-control form-control-lg" placeholder="Search anything...">  
                  <button id="search-button" type="button" class="btn btn-dark">
                <i class="bi bi-search"></i>
                  </button>
            </div>
                </div>
                <div id="read" class="mt-5"></div>
            </div>         
        </div>
      </div>
    </div><!-- End Tracking Section -->

    <!-- ======= Tips Perawatan Section ======= -->
    <div id="tips_perawatan" class="our-team-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h3>Tips Perawatan</h3>
            </div>
          </div>
        </div>
        <br>
        <p style="text-align: center">
          Perawatan yang dilakukan terhadap perawatan untuk mencegah terjadinya kerusakan. 
          Dengan melakukan langkah perawatan sederhana dapat membantu memperpanjang jangka 
          pakai peralatan elektronik maupun handphope yang anda miliki.
        </p>
        <br>
        <div class="row">
          @php
            $i=1;
          @endphp
          @foreach ($tips as $item)
            <div class="col-md-3">
            <div class="card">
              <img class="card-img-top" src="{{ asset('storage/'.$item->gambar) }}" width="214" height="140" alt="Card image cap">
              <div class="card-body">
                <h6 class="card-title"><b>Tips Perawatan : {{ $item->judul }}</b></h6>
                <ul>
                  @php
                    $no=1;
                    $list2 = App\Models\TipPerawatan::find($i);
                    if($list2 == null){
                      $i++;
                    }else{
                      foreach ($list2->listperawatan as $n)
                      {
                        @endphp
                        <li>{{ $no++ }}. @php echo $n->list_tips @endphp </li> @php
                      }
                    }
                  @endphp
                  
                </ul>
              </div>
            </div>
          </div>
          @php
            $i++;
          @endphp
      @endforeach
    </div>
      </div>
    </div><!-- End Team Section -->
  </main><!-- End #main -->
@endsection