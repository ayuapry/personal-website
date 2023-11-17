@extends('user.layouts.app')
@section('title', 'Portfolio')
@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Portfolio</h2>
          <p class="animate__animated fanimate__adeInUp">Crafting Digital Experiences, One Line of Code at a Time: Where Innovation Meets Imagination in My Portfolio!</p>
          <a href="#portfolio" class="btn-get-started animate__animated animate__fadeInUp scrollto">Know More</a>
        </div>
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio-mf sect-pt4 route">
        <div class="container">
            <div class="row">
                @foreach ($portfolios as $portfolio)
                    <div class="col-md-4">
                        <div class="work-box">
                            <a href="{{ Storage::url($portfolio->image) }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox">
                                <div class="work-img">
                                    <img src="{{ Storage::url($portfolio->image) }}" alt="" class="img-fluid gambar">
                                </div>
                            </a>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title">{{ $portfolio->content_title }}</h2>
                                        <div class="w-more">
                                            <span class="w-ctegory">{{ $portfolio->portocategory->name }}</span> / <span
                                                class="w-date">{{ $portfolio->tanggal }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="portfolio/{{ $portfolio->id }}">Know More <span class="bi bi-arrow-right"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Portfolio Section -->

@endsection