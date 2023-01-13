@extends('layout.index')
@section('content')

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Pesan Sekarang</p>
                    <h1>Order Space Work</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- latest news -->
<div class="latest-news mt-150 mb-150">
    <div class="container">
        <div class="row">
            @forelse($spacework as $space)
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-news">
                    <a href="single-news.html">
                        <div class="latest-news-bg" style="background-image: url(<?= ('storage/storage/' . $space->image) ?>);"></div>
                    </a>
                    <div class="news-text-box text-center">
                        <h3><a href="single-news.html" class="text-uppercase">{{$space->nama_space}}</a></h3>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> {{$space->pemilik_space}}</span>
                            <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                        </p>
                        <a href="/order/{{$space->id_space}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Order Now</a>
                    </div>
                </div>
            </div>
            @empty'
            <div class="col text-center pt-4 pb-4">
                No Data
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="row justify-content-center mt-5">
            {{ $spacework->links() }}
        </div>
    </div>
</div>
<!-- end latest news -->s

@endsection
