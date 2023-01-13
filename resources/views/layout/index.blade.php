<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

  <!-- title -->
  <title><?= $title ?></title>

  <!-- favicon -->
  <link rel="shortcut icon" type="image/png" href="{{ asset('pages/img/favicon.png') }}">
  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <!-- fontawesome -->
  <link rel="stylesheet" href="{{ asset('pages/css/all.min.css') }}">
  <!-- bootstrap -->
  <link rel="stylesheet" href="{{ asset('pages/bootstrap/css/bootstrap.min.css') }}">
  <!-- owl carousel -->
  <link rel="stylesheet" href="{{ asset('pages/css/owl.carousel.css') }}">
  <!-- magnific popup -->
  <link rel="stylesheet" href="{{ asset('pages/css/magnific-popup.css') }}">
  <!-- animate css -->
  <link rel="stylesheet" href="{{ asset('pages/css/animate.css') }}">
  <!-- mean menu css -->
  <link rel="stylesheet" href="{{ asset('pages/css/meanmenu.min.css') }}">
  <!-- main style -->
  <link rel="stylesheet" href="{{ asset('pages/css/main.css') }}">
  <!-- responsive -->
  <link rel="stylesheet" href="{{ asset('pages/css/responsive.css') }}">
  {{-- Sweat alert --}}
  <link rel="stylesheet" href="{{ asset('pages/bootstrap/css/sweetalert2.min.css') }}">
  <script src="{{ asset('pages/bootstrap/js/sweetalert2.min.js') }}"></script>
  {{-- leaflet --}}
  <link rel="stylesheet" href="{{ asset('pages/css/leaflet.css') }}">
  <script src="{{ asset('pages/js/leaflet.js') }}"></script>
</head>

<body>
  <div class="" id="success" data-flash="<?= session()->get('success') ?>"></div>
  <!--PreLoader-->
  <div class="loader">
    <div class="loader-inner">
      <div class="circle"></div>
    </div>
  </div>
  <!--PreLoader Ends-->


  <!-- header -->
  <div class="top-header-area" id="sticker">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-12 text-center">
          <div class="main-menu-wrap">
            <!-- logo -->
            <div class="site-logo">
              <a>
                <img src="{{ asset('pages/img/logo.png') }}" alt="">
              </a>
            </div>
            <!-- logo -->

            <!-- menu start -->
            <nav class="main-menu">
              <ul>
                <li <?= $title == 'SpaceWork' ? 'class="current-list-item"' : '' ?>><a href="{{ route('space.index') }}">Beranda</a></li>
                <li <?= $title == 'Boking Space' ? 'class="current-list-item"' : '' ?>><a href="{{ route('boking.index') }}">Boking</a></li>
                <li <?= $title == 'Tempat Saya' ? 'class="current-list-item"' : '' ?>><a href="{{ route('manage.index') }}">Tempat Saya</a></li>
                <li <?= $title == 'Tentang' ? 'class="current-list-item"' : '' ?>><a href="{{ route('about.index') }}">Tentang</a></li>
                <li <?= $title == 'Contact' ? 'class="current-list-item"' : '' ?>><a href="contact.html">Contact</a></li>
                <li>
                  <div class="header-icons">
                    <a class="shopping-cart" href="{{ route('history.index') }}"><i class="fas fa-book"></i></a>
                    <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <a class="" onclick="return logout('{{ route('logout') }}')"><i class="fa fa-user-times"></i></a>
                  </div>
                </li>
              </ul>
            </nav>
            <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
            <div class="mobile-menu"></div>
            <!-- menu end -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end header -->

  <!-- search area -->
  <div class="search-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="close-btn"><i class="fas fa-window-close"></i></span>
          <div class="search-bar">
            <div class="search-bar-tablecell">
              <h3>Search For:</h3>
              <input type="text" placeholder="Keywords">
              <button type="submit">Search <i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end search area -->


  @yield('content')


  <!-- footer -->
  <div class="footer-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="footer-box pages">
            <h2 class="widget-title">My Teams</h2>
            <ul>
              <li>Rery Ayu Restami ( TI17200041 )</li>
              <li>Baiq Umi Kalsum ( TI17200007 )</li>
              <li>Muliana ( TI17200033 )</li>
              <li>Putri Nirmalasari ( TI17200039 )</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="footer-box get-in-touch">
            <h2 class="widget-title">Customer Service</h2>
            <ul>
              <li>CS Kami</li>
              <li>+62 878 1359 5950</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="footer-box pages">
            <h2 class="widget-title">Pages</h2>
            <ul>
              <li><a href="index.html">beranda</a></li>
              <li><a href="about.html">Boking</a></li>
              <li><a href="services.html">Tempat Saya</a></li>
              <li><a href="news.html">Tentang</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="footer-box subscribe">
            <h2 class="widget-title">Subscribe</h2>
            <p>Subscribe to our mailing list to get the latest updates.</p>
            <form action="index.html">
              <input type="email" placeholder="Email">
              <button type="submit"><i class="fas fa-paper-plane"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end footer -->

  <!-- copyright -->
  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <p>Copyrights &copy; 2022 - <a href="https://stmiklombok.ac.id/">STMIK Lombok</a>, All Rights
            Reserved.<br>
          </p>
        </div>

        <div class="col-lg-6 text-right col-md-12">
          <div class="social-icons">
            <ul>
              <li><a href="https://wasap.at/KYsOVH" target="_blank"><i class="fab fa-whatsapp"></i></a>
              </li>
              <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end copyright -->



  <!-- jquery -->
  <script src="{{ asset('pages/js/jquery-1.11.3.min.js') }}"></script>
  <!-- bootstrap -->
  <script src="{{ asset('pages/bootstrap/js/bootstrap.min.js') }}"></script>
  <!-- count down -->
  <script src="{{ asset('pages/js/jquery.countdown.js') }}"></script>
  <!-- isotope -->
  <script src="{{ asset('pages/js/jquery.isotope-3.0.6.min.js') }}"></script>
  <!-- waypoints -->
  <script src="{{ asset('pages/js/waypoints.js') }}"></script>
  <!-- owl carousel -->
  <script src="{{ asset('pages/js/owl.carousel.min.js') }}"></script>
  <!-- magnific popup -->
  <script src="{{ asset('pages/js/jquery.magnific-popup.min.js') }}"></script>
  <!-- mean menu -->
  <script src="{{ asset('pages/js/jquery.meanmenu.min.js') }}"></script>
  <!-- sticker js -->
  <script src="{{ asset('pages/js/sticker.js') }}"></script>
  <!-- main js -->
  <script src="{{ asset('pages/js/main.js') }}"></script>

  <script>
    flash = document.getElementById('success');
    sukses = flash.getAttribute('data-id');
    if (sukses = '<?= session()->get('success') ?>') {
      Swal.fire({
        title: 'Berhasil !',
        text: "<?= session()->get('success') ?>",
        icon: 'success',
        allowOutsideClick: false,
        confirmButtonColor: '#51eb1a',
        confirmButtonText: 'Ok!'
      })
    };

    // glt= document.getElementById('error');
    err = {{ count($errors) }};
    if (err > 0) {
      Swal.fire({
        title: 'Error!',
        text: "Silahkan Masukkan Data Dengan Benar!",
        icon: 'error',
        allowOutsideClick: false,
        confirmButtonColor: '#51eb1a',
        confirmButtonText: 'Ok!'
      })
    };


    function logout(url) {
      Swal.fire({
        title: 'Apakah Kamu Yakin?',
        text: "Ingin Keluar.",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#0fd419',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Tidak'
      }).then((result) => {
        if (result.isConfirmed) {
          document.location = url;
        }
      })
    };
  </script>
</body>

</html>
