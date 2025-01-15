@extends('layouts.app')
@section('title', 'Academic Staff')
@section('content')
  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <nav class="breadcrumbs">
      <div class="container">
        <ol class="p-0">
          <li><a href="">Home</a></li>
          <li class="current">Search Result</li>
        </ol>
        <div class="mt-4 pt-4">
          <h2>List of Experts</h2>
          <p>List of experts from specific areas or disciplines at Jember State Polytechnic (Polije)</p>
        </div>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <!-- Starter Section Section -->
  <section id="starter-section" class="starter-section section">
    <div class="container" data-aos="fade-up">
      <p>Search result found {{ $dataJumlah[0]->jumlah }} data with keyword <b>{{ $key }}</b></p>
      <div class="row">
        <style>
          a>.card {
            animation-name: borderAnimationNoHover;
            animation-direction: alternate;
            animation-fill-mode: forwards;
            animation-duration: .3s;
            animation-timing-function: ease;
          }
          a:hover>.card {
            animation-name: borderAnimation;
            animation-direction: alternate;
            animation-fill-mode: forwards;
            animation-duration: .3s;
            animation-timing-function: ease;
          }
          @keyframes borderAnimation {
            from {border: var(--bs-card-border-width) solid var(--bs-border-color-translucent);}
            to {border: var(--bs-card-border-width) solid var(--bs-primary-text-emphasis);}
          }
          @keyframes borderAnimationNoHover {
            from {border: var(--bs-card-border-width) solid var(--bs-primary-text-emphasis);}
            to {border: var(--bs-card-border-width) solid var(--bs-border-color-translucent);}
          }
        </style>
        @foreach ($resultData as $item)
          <div class="col-md-4">
            <a href="{{ route('search.show', ['search' => $item['dataStaff']->id_staff]) }}">
              <div class="card shadow">
                <div class="card-body d-flex">
                  <div class="col-md-3 me-2">
                    <img src="{{ asset('assets/img/staff/khafid.png') }}" alt="profil" class="rounded-circle w-100">
                  </div>
                  <div class="col-md-9">
                    <p class="fs-6 m-0 text-primary-emphasis fw-bold">{{ $item['dataStaff']->nama_lengkap }}, {{ $item['dataStaff']->gelar }}</p>
                    <p class="fs-6">Information Technology</p>
                    <p class="fs-6 m-0 text-primary-emphasis fw-light">{{ $item['dataPublikasi']->jumlah }} Publication {{ $item['dataPaten']->jumlah }} Patent/IP</p>
                    <p class="fs-6 m-0 text-primary-emphasis fw-light">{{ $item['dataPrototipe']['jumlah'] }} Prototype {{ $item['dataPenelitian']->jumlah }} Research</p>
                    <p class="fs-6 text-primary-emphasis fw-light">{{ $item['dataPengabdian']->jumlah }} Community Service</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>

  </section><!-- /Starter Section Section -->
@endsection