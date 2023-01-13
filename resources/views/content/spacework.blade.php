@extends('layout.index')
@section('content')
    <!-- hero area -->
    <div class="hero-area hero-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-2 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <h1>Banyak Rekomendasi Space Work</h1>
                            <div class="hero-btns">
                                <a href="{{ route('boking.index') }}" class="boxed-btn">Lihat Semua</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero area -->

    <!-- features list section -->
    <div class="list-section pt-80 pb-80">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content">
                            <h3>
                                Respon Cepat
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>24/7 Support</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content">
                            <h3>Refund</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end features list section -->

    <!-- latest news -->
    <div class="latest-news pt-150 pb-150">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Postingan</span> Terbaru</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse($spacework as $space)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-news">
                            <a>
                                <div class="latest-news-bg"
                                    style="background-image: url(<?= 'storage/storage/' . $space->image ?>);"></div>
                            </a>
                            <div class="news-text-box text-center">
                                <h3><a class="text-uppercase">{{ $space->nama_space }}</a></h3>
                                <p class="blog-meta">
                                    <span class="author"><i class="fas fa-user"></i> {{ $space->pemilik_space }}</span>
                                    <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                                </p>
                                <a href="/order/{{ $space->id_space }}" class="cart-btn"><i
                                        class="fas fa-shopping-cart"></i> Order Now</a>
                            </div>
                        </div>
                    </div>
                @empty'
                    <div class="col text-center pt-4 pb-4">
                        No Data
                    </div>
                @endforelse
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="{{ route('boking.index') }}" class="boxed-btn">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end latest news -->

    <!-- testimonail-section -->
    <div class="testimonail-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="{{ asset('pages/img/team/team-2.jpeg') }}" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Rery Ayu Restami <span>TI17200041</span></h3>
                                <p class="testimonial-body">
                                    "Isi Bebas Profile Sendiri"
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="{{ asset('pages/img/team/team-1.jpg') }}" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Baiq Umi Kalsum <span>TI17200007</span></h3>
                                <p class="testimonial-body">
                                    "Isi Bebas Profile Sendiri"
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="{{ asset('pages/img/team/team-4.jpg') }}" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Muliana <span>TI17200033</span></h3>
                                <p class="testimonial-body">
                                    "Isi Bebas Profile Sendiri"
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="{{ asset('pages/img/team/team-3.jpg') }}" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Putri Nirmalasari <span>TI17200039</span></h3>
                                <p class="testimonial-body">
                                    "Isi Bebas Profile Sendiri"
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end testimonail-section -->
@endsection
