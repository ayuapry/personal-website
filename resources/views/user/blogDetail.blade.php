@extends('user.layouts.app')
@section('title', 'Blog Details')
@section('content')
 <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Blog</h2>
          <p class="animate__animated fanimate__adeInUp">{{ $blog->title }}</p>
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
<section class="blog-wrapper sect-pt4" id="blog">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="post-box">
              <div class="post-thumb">
                <img src="assets/img/post-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="post-meta">
                <h1 class="article-title">{{ $blog->title }}</h1>
                <ul>
                  <li>
                    <span class="bi bi-person"></span>
                    <a href="#">AyuApry</a>
                  </li>
                  <li>
                    <span class="bi bi-tag"></span>
                    <a href="#">{{ $blog->blogcategory->name }}</a>
                  </li>
                </ul>
              </div>
              <div class="article-content">
                <p>
                  {!! $blog->content !!}
                </p>
                <blockquote class="blockquote">
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                </blockquote>
                <p>
                  Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Mauris blandit
                  aliquet elit, eget tincidunt
                  nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet,
                  consectetur adipiscing elit. Donec sollicitudin molestie malesuada.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget-sidebar">
              <h5 class="sidebar-title">Recent Post</h5>
              <div class="sidebar-content">
                <ul class="list-sidebar">
                  @foreach ($blogs as $item)
                      <li>
                        <a href="/blog/{{ $item->id }}">{{ $item->title }}</a>
                      </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="widget-sidebar widget-tags">
              <h5 class="sidebar-title">Tags</h5>
              <div class="sidebar-content">
                <ul>
                  @foreach ($blogcategories as $blogcategory)
                    <p class="btn btn-sm btn-primary">{{ $blogcategory->name }}</p>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Blog Single Section -->

@endsection