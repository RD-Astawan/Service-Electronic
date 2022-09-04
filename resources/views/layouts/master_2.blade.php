<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Customer-dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('homepage/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('homepage/css/style.css') }}" rel="stylesheet">
  <style>
    .box {  
        width: 300px;  
        height: 220px;  
        text-align: center;  
        padding: 15px; 
        border: 2px solid grey;  
        }  
        .box_img {  
        object-fit: cover;  
        }
      
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.step-wizard {
    display: flex;
    justify-content: center;
    align-items: center;
}
.step-wizard-list{
    /* background: #fff;
    box-shadow: 0 15px 25px rgba(0,0,0,0.1); */
    color: #333;
    list-style-type: none;
    border-radius: 10px;
    display: flex;
    padding: 20px 10px;
    position: relative;
    z-index: 10;
}

.step-wizard-item{
    padding: 0 20px;
    flex-basis: 0;
    -webkit-box-flex: 1;
    -ms-flex-positive:1;
    flex-grow: 1;
    max-width: 100%;
    display: flex;
    flex-direction: column;
    text-align: center;
    min-width: 170px;
    position: relative;
}
.step-wizard-item + .step-wizard-item:after{
    content: "";
    position: absolute;
    left: 0;
    top: 19px;
    background: #21d4fd;
    width: 100%;
    height: 2px;
    transform: translateX(-50%);
    z-index: -10;
}
.progress-count{
    height: 40px;
    width:40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-weight: 600;
    margin: 0 auto;
    position: relative;
    z-index:10;
    color: transparent;
}
.progress-count:after{
    content: "";
    height: 40px;
    width: 40px;
    background: #21d4fd;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
    z-index: -10;
}
.progress-count:before{
    content: "";
    height: 10px;
    width: 20px;
    border-left: 3px solid #fff;
    border-bottom: 3px solid #fff;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -60%) rotate(-45deg);
    transform-origin: center center;
}
.progress-label{
    font-size: 14px;
    font-weight: 600;
    margin-top: 10px;
}
.current-item .progress-count:before,
.current-item ~ .step-wizard-item .progress-count:before{
    display: none;
}
.current-item ~ .step-wizard-item .progress-count:after{
    height:10px;
    width:10px;
}
.current-item ~ .step-wizard-item .progress-label{
    opacity: 0.5;
}
.current-item .progress-count:after{
    background: #fff;
    border: 2px solid #21d4fd;
}
.current-item .progress-count{
    color: #21d4fd;
}

.whats-app {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 40px;
    background-color: #25d366;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    padding-top: 10px;
    font-size: 40px;
    left: 15px;
    z-index: 100;
}

.my-float {
    margin-top: 10px;
}
.card{
  min-height: 350px;
  margin-bottom:20px;
}
    
  </style>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">
      <div class="logo">
        <h1><a href="index.html"><span>W</span>SE</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#beranda">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#profil">Profil</a></li>
          <li><a class="nav-link scrollto" href="#tracking">Tracking</a></li>
          <li><a class="nav-link scrollto" href="#tips_perawatan">Tips Perawatan</a></li>
          <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a>
            <form id="formlogout" action="{{ route('logout') }}" method="post">@csrf</form>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= hero Section ======= -->
  <section id="hero" style="height: 350px !important">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000" style="height: 350px !important">
        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active" style="background-image: url({{ asset('homepage/img/hero-carousel/1.jpg') }})">
          </div>
          <div class="carousel-item" style="background-image: url({{ asset('homepage/img/hero-carousel/2.jpg') }})">
          </div>
          <div class="carousel-item" style="background-image: url({{ asset('homepage/img/hero-carousel/3.jpg') }})"></div>
        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>
      </div>
    </div>
  </section><!-- End Hero Section -->
    <div class="main">
        @yield('main')
    </div>
   <!-- ======= Footer ======= -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>Wahyu Service Elektronik</strong>
              </p>
            </div>
            <div class="credits">
              Designed by <a href="https://bootstrapmade.com/">reac code</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('homepage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('homepage/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('homepage/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('homepage/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('homepage/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('homepage/js/main.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      readData();
    $("#search-input").keyup(function(){
      var strcari = $("#search-input").val();
      var len = strcari.length;
      if(len > 3){
        if(strcari != ""){
          $("#read").html('<center class="text-muted">Melakukan Pencarian ....</center>');
          $.ajax({
            type: "get",
            url : "{{ url('search') }}",
            data: "id=" +strcari,
            success:function(data){
              $("#read").html(data);
            }
          });
        }
        else{
          readData()
        }
      }
      else{
        $("#read").html('<center class="text-muted">Masukan ID secara lengkap ....</center>');
      }
    });
  });
  
  function readData(){
    $.get("{{ url('read') }}", {}, 
        function(data, status){
        $("#read").html(data);
      });
  }
</script>
</body>
</html>