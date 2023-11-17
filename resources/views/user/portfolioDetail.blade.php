<!-- resources/views/user/portfolio/show.blade.php -->
@extends('user.layouts.app')
@section('title', 'Portfolio Details')
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

  </section>
  <!-- End Hero -->

  <main id="main">
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide">
                  <img src="{{ Storage::url($portfolio->image) }}" alt="{{ $portfolio->content_title }}">
                </div>
                <!-- Add more slides if necessary -->
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong>: {{ $portfolio->portocategory->name }}</li>
                <li><strong>Project date</strong>: {{ $portfolio->tanggal }}</li>
                <li><strong>Project URL</strong>: <a href="{{ $portfolio->url }}">{{ $portfolio->url }}</a></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>{{ $portfolio->content_title }}</h2>
              <p>{!! $portfolio->content !!}</p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
@endsection
