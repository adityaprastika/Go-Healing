<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@section('title')@endsection</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-dark navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 text-blue"><span class="text-white">GO</span>HEALING</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="{{ route('main') }}" class="nav-item nav-link active">Home</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pelayanan</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="{{ route('wisata') }}" class="dropdown-item">Paket Wisata</a>
                                <a href="{{ route('rental') }}" class="dropdown-item">Rental Mobil</a>
                            </div>
                        </div>
                        @auth
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Order</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="{{ route('customer.order.index') }}" class="dropdown-item">Order</a>
                                <a href="{{ route('history') }}" class="dropdown-item">History</a>
                            </div>
                        </div>
                        @endauth
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-item nav-link">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                @else
                                <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                            @endauth
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

   
    <!-- Service End -->

@yield('content')


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-3 px-sm-3 px-lg-4" style="margin-top: 30px;">
        <div class="row pt-5">
            <div class="col-lg-6 col-md-3 mb-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-blue"><span class="text-white">GO</span>HEALING</h1>
                </a>
                <p>Go Healing adalah perusahaan tur dan perjalanan yang menghadirkan pengalaman wisata yang menyembuhkan dan menyehatkan. Kami menyediakan paket perjalanan yang menggabungkan meditasi, yoga, terapi alam, dan makanan sehat untuk membantu Anda menemukan kedamaian dan keseimbangan dalam hidup yang sibuk. Bersama-sama, mari pulihkan dan jalin ikatan dengan diri sendiri melalui perjalanan yang bermakna. Bergabunglah dengan Go Healing dalam perjalanan penyembuhan Anda hari ini.</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Ikuti Kami</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-outline-blue btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-blue btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-danger btn-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Produk Kami</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Paket Wisata</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Rental Mobil</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Lokasi Kami</h5>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.861183058605!2d115.15911107512892!3d-8.79910988996173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd244c13ee9d753%3A0x6c05042449b50f81!2sPoliteknik%20Negeri%20Bali!5e0!3m2!1sen!2sid!4v1689658563132!5m2!1sen!2sid" width="350" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-blue btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('front/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('front/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('front/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('front/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('front/js/main.js') }}"></script>

    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

    <script>
      @if(Session::has('success'))
      toastr.options =
      {
          "closeButton" : true,
          "progressBar" : true
      }
              toastr.success("{{ session('success') }}");
      @endif

      @if(Session::has('error'))
      toastr.options =
      {
          "closeButton" : true,
          "progressBar" : true
      }
              toastr.error("{{ session('error') }}");
      @endif

      @if(Session::has('info'))
      toastr.options =
      {
          "closeButton" : true,
          "progressBar" : true
      }
              toastr.info("{{ session('info') }}");
      @endif

      @if(Session::has('warning'))
      toastr.options =
      {
          "closeButton" : true,
          "progressBar" : true
      }
              toastr.warning("{{ session('warning') }}");
      @endif
    </script>
</body>
@yield('script')

</html>
