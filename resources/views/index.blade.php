@extends('layouts.main')
@section('title')
Index
@endsection

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('images/travel.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                            <h1 class="display-4 text-white mb-md-4">Temukan Tempat-Tempat Menakjubkan Bersama Kami</h1>
                            <a href="{{ route('login') }}" class="btn btn-blue py-md-3 px-md-5 mt-2">Jelajahi Sekarang Juga</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('images/travel2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                            <h1 class="display-4 text-white mb-md-4">Jelajahi Keindahan Destinasi Bersama Kami</h1>
                            <a href="{{ route('login') }}" class="btn btn-blue py-md-3 px-md-5 mt-2">Jelajahi Sekarang Juga</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>

     <!-- Service Start -->
    <div class="container-fluid py-3">
    <div class="container pt-3 pb-2">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-blue text-uppercase" style="letter-spacing: 5px;">Pelayanan</h6>
            <h1>Pelayanan Yang Kami Tawarkan</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4"> <!-- Adjusted from col-lg-4 col-md-6 mb-4 -->
                <div class="service-item bg-white text-center mb-2 py-5 px-4">
                    <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                    <h5 class="mb-2">Paket Travel</h5>
                    <p class="m-0">"Dapatkan pengalaman unik dan jelajahi tempat-tempat menakjubkan di seluruh dunia. Nikmati perjalanan yang penuh kenangan dan rasa inspirasi yang mendalam."</p>
                </div>
            </div>
            <div class="col-lg-6 mb-4"> <!-- Adjusted from col-lg-4 col-md-6 mb-4 -->
                <div class="service-item bg-white text-center mb-2 py-5 px-4">
                    <i class="fa fa-2x fa-car mx-auto mb-4"></i>
                    <h5 class="mb-2">Rental Mobil</h5>
                    <p class="m-0">"Nikmati pengalaman mengemudi yang menyenangkan dengan armada mobil berkualitas tinggi kami. Dapatkan layanan rental mobil yang andal dan terjangkau."</p>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- About Start -->
    <div class="container-fluid py-5">
        
        <div class="container pt-5">
            <div class="text-center mb-3 pb-3">
            <h6 class="text-blue text-uppercase" style="letter-spacing: 3px;">Paket Wisata</h6>
            <h1>Custom Paket Wisata</h1>
        </div>
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{ asset('images/abat.jpg') }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h1 class="mb-3">Menyediakan Custom Paket Wisata</h1>
                        <p>Anda Butuh Bantuan? Hubungi kami untuk bantuan atau informasi lebih lanjut dan apabila ingin membuat paket wisata sesuai keinginan anda melalui whataspp dibawah ini</p>
                        <a href="https://wa.me/087739003911" class="btn btn-blue mt-1"> <i class="fab fa-whatsapp"> Hubungi Kami di WhatsApp</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


@endsection
