  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{ url('/') }}">AyuApry</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{ url('/') }}">Home</a></li>
          {{-- <li><a class="nav-link scrollto" href="{{ url('/about') }}">About</a></li> --}}
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/blog') }}">Blog</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/portfolio')}}">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/contact')}}">Contact</a></li>
          {{-- <li class="bg-primary text-center rounded-3 d-flex justify-center"><a href="{{ url('/login')}}">Login</a></li> --}}
          <div class="d-flex justify-content-center" style="margin-left: 20px">
              <li class="bg-primary text-center rounded-3"><a href="{{ url('/login')}}" class="text-light text-decoration-none py-2 px-4 d-block">Login</a></li>
          </div>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
