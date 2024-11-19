@extends('layouts.app')
@section('title', 'Academic Staff')
@section('content')
  <!-- Hero Section -->
  <section id="hero" class="hero section light-background">
    <img src="{{ asset('assets/img/hero-bg.jpg') }}" style="opacity: 0.5" alt="" data-aos="fade-in">
    <div class="container position-relative">
      <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
        <div class="w-100" style="background-image: url({{ asset('assets/img/logo.png') }}); background-size: cover; min-height: 220px; background-repeat: no-repeat; background-position: center;"></div>
        <h2 class="text-center">Lab Komputasi Sistem Informasi</h2>
      </div><!-- End Welcome -->

      <div class="content row gy-4">
        <div class="col-lg-12 d-flex align-items-stretch justify-content-center">
          <div class="w-75" data-aos="zoom-out" data-aos-delay="200">
            <form action="" method="post" class="d-flex flex-column align-items-center">
              <div class="form-group mb-4 w-100">
                <input type="text" name="search" id="search" placeholder="Ketikkan kata kunci" class="form-control">
              </div>
              <button class="btn btn-primary w-25" type="submit">Search</button>
            </form>
          </div>
        </div><!-- End Why Box -->

        {{-- <div class="col-lg-8 d-flex align-items-stretch">
          <div class="d-flex flex-column justify-content-center">
            <div class="row gy-4">

              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Corporis voluptates officia eiusmod</h4>
                  <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                  <i class="bi bi-gem"></i>
                  <h4>Ullamco laboris ladore pan</h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                  <i class="bi bi-inboxes"></i>
                  <h4>Labore consequatur incidid dolore</h4>
                  <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                </div>
              </div><!-- End Icon Box -->

            </div>
          </div>
        </div> --}}
      </div><!-- End  Content-->

    </div>

  </section>
  <!-- /Hero Section -->
@endsection