@extends('layouts/master_2')
@section('main')
  <main id="main">
     <!-- ======= Beranda Section ======= -->
     <div id="beranda" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="row text-center">
            <div class="row">
              <div class="col-md-4">
                <div class="card" style="min-height: 450px;">
                  <img class="card-img-top" src="{{ asset('assets/img/img.jpg') }}" alt="Card image cap">
                  <div class="card-body"><br>
                    <h6 class="card-title"><b>Wahyu Service Elektronik</b></h6><hr>
                    <p class="card-text">Wahyu Service Elektronik dapat memperbaiki peralatan elektroik dan 
                      juga <i>handphone</i>, yang berlokasi di Jl. Pertulaka No.6 Denpasar Utara, Bali </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card" style="min-height: 450px;">
                  <img class="card-img-top" src="{{ asset('assets/img/img.jpg') }}" alt="Card image cap">
                  <div class="card-body"><br>
                    <h6 class="card-title"><b>Tracking Perbaikan</b></h6><hr>
                    <p class="card-text">Tracking perbaikan ini merupakan fitur yang dapat anda gunakan untuk 
                      melihat sejauh mana proses perbaikan dari barang yang di servis</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card" style="min-height: 450px;">
                  <img class="card-img-top" src="{{ asset('assets/img/img.jpg') }}" alt="Card image cap">
                  <div class="card-body"><br>
                    <h6 class="card-title"><b>Tips Perawatan</b></h6><hr>
                    <p class="card-text">Melakukan langkah perawatan sederhana dapat membantu memperpanjang jangka
                      pakai peralatan elektronik maupun <i>handphone</i> yang anda miliki</p>
                    </p>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>
      </div>
    </div><!-- End Beranda Section -->

    <!-- ======= Profile Section ======= -->
    <div id="profil" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h3>Profile Wahyu Service Elektronik</h3>
            </div>
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="well-left">
              <div class="single-well">
                <div class="box">
                <a href="#">
                  <img src="{{ asset('homepage/img/about/1.jpg') }}" class="box_img" width = "300" height = "300" alt="">
                </a>
            </div>
              </div>
            </div>
          </div>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="well-middle">
              <div class="single-well" style="text-align: justify">
                <p>
                    Wahyu Service Elektronik sudah mulai beroperasi sejak tahun 2005 dengan pendiri 
                    sekaligus pemilik usaha bernama Bapak Made Artawan. Dulunya wahyu service Elektronik 
                    hanya menerima perbaikan peralatan elektronik saja. Namun sejak tahun 2020, Wahyu Service
                     Elektronik mulai menerima perbaikan hanphone dengan segala jenis merek yang dimana 
                     pengelolaanya dibantu oleh sang anak
                </p>
                <p>
                    Wahyu Service Elektronik berlokasi di Jl. Pertulaka No.6 Denpasar Utara. Lokasi 
                    tersebut berdekatan dengan pasar tradisional Agung Peninjoan. Lokasi ini sudah 
                    terdaftar pada google map dengan nama Wahyu Service Elektronik 
                </p>
                <p>
                    Wahyu Service Elektronik sudah sangat dipercaya oleh perusahaan-perusahaan besar 
                    sehingga memiliki kerjasama dengan berbagai hotel, penginapan dan juga villa yang 
                    ada di Bali
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Profile Section -->

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
          <div class="col-md-3">
          <div class="card">
            <img class="card-img-top" src="{{ asset('assets/img/img.jpg') }}" alt="Card image cap">
            <div class="card-body">
              <h6 class="card-title"><b>Tips Perawatan :</b></h6>
              <ul>
                <li>1. ..........</li>
                <li>2. ..........</li>
                <li>3. ..........</li>
                <li>4. ..........</li>
                <li>5. ..........</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img class="card-img-top" src="{{ asset('assets/img/img.jpg') }}" alt="Card image cap">
            <div class="card-body">
              <h6 class="card-title"><b>Tips Perawatan :</b></h6>
              <ul>
                <li>1. ..........</li>
                <li>2. ..........</li>
                <li>3. ..........</li>
                <li>4. ..........</li>
                <li>5. ..........</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img class="card-img-top" src="{{ asset('assets/img/img.jpg') }}" alt="Card image cap">
            <div class="card-body">
              <h6 class="card-title"><b>Tips Perawatan :</b></h6>
              <ul>
                <li>1. ..........</li>
                <li>2. ..........</li>
                <li>3. ..........</li>
                <li>4. ..........</li>
                <li>5. ..........</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img class="card-img-top" src="{{ asset('assets/img/img.jpg') }}" alt="Card image cap">
            <div class="card-body">
              <h6 class="card-title"><b>Tips Perawatan :</b></h6>
              <ul>
                <li>1. ..........</li>
                <li>2. ..........</li>
                <li>3. ..........</li>
                <li>4. ..........</li>
                <li>5. ..........</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-md-3">
        <div class="card">
          <img class="card-img-top" src="{{ asset('assets/img/img.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h6 class="card-title"><b>Tips Perawatan :</b></h6>
              <ul>
                <li>1. ..........</li>
                <li>2. ..........</li>
                <li>3. ..........</li>
                <li>4. ..........</li>
                <li>5. ..........</li>
              </ul>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img class="card-img-top" src="{{ asset('assets/img/img.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h6 class="card-title"><b>Tips Perawatan :</b></h6>
              <ul>
                <li>1. ..........</li>
                <li>2. ..........</li>
                <li>3. ..........</li>
                <li>4. ..........</li>
                <li>5. ..........</li>
              </ul>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img class="card-img-top" src="{{ asset('assets/img/img.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h6 class="card-title"><b>Tips Perawatan :</b></h6>
              <ul>
                <li>1. ..........</li>
                <li>2. ..........</li>
                <li>3. ..........</li>
                <li>4. ..........</li>
                <li>5. ..........</li>
              </ul>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img class="card-img-top" src="{{ asset('assets/img/img.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h6 class="card-title"><b>Tips Perawatan :</b></h6>
              <ul>
                <li>1. ..........</li>
                <li>2. ..........</li>
                <li>3. ..........</li>
                <li>4. ..........</li>
                <li>5. ..........</li>
              </ul>
          </div>
        </div>
      </div>
    </div>
      </div>
    </div><!-- End Team Section -->
  </main><!-- End #main -->
@endsection