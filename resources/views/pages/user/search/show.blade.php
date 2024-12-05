@extends('layouts.app')
@section('title', 'Academic Staff')
@section('content')
  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <nav class="breadcrumbs">
      <div class="container">
        <ol class="p-0">
          <li><a href="">Home</a></li>
          <li class="current">Experts</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <!-- Starter Section Section -->
  <section id="starter-section" class="starter-section section">
    <div class="container" data-aos="fade-up">
      <div class="card shadow">
        <div class="card-body">
          <div class="row p-3">
            <div class="col-md-2">
              <img src="{{ asset('assets/img/staff/khafid.png') }}" alt="profil" class="w-100">
            </div>
            <div class="col-md-7">
              <p class="fs-4 text-primary-emphasis fw-bold">{{ $dataStaff->nama_lengkap }}, {{ $dataStaff->gelar }}</p>
              <p class="fs-6 light">EDUCATION/ EDUCATIONAL TECHNOLOGY AND COMPUTING/ SPECIALIST STUDIES IN EDUCATION</p>
              <div class="row text-primary-emphasis fw-light">
                <div class="col-md-1 pe-1">
                  <span class="material-symbols-outlined">domain</span>
                </div>
                <div class="col-md-11 ps-0">
                  <span>{{ $dataStaff->kantor[0]->nama_kantor }}</span>
                </div>
              </div>
              <div class="row text-primary-emphasis fw-light">
                <div class="col-md-1 pe-1">
                  <span class="material-symbols-outlined">location_on</span>
                </div>
                <div class="col-md-11 ps-0">
                  <span>{{ $dataStaff->kantor[0]->nama_kantor }} {{ $dataKampus->kampus[0]->nama_kampus }} {{ $dataStaff->kantor[0]->alamat_kantor }}</span>
                </div>
              </div>
              <div class="row text-primary-emphasis fw-light">
                <div class="col-md-1 pe-1">
                  <span class="material-symbols-outlined">mail</span>
                </div>
                <div class="col-md-11 ps-0">
                  <span>{{ $dataStaff->email_staff }}</span>
                </div>
              </div>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center p-3">
        <a href="#" onclick="setSection(this)" aria-label="profile" style="max-width: fit-content" class="btn btn-primary mx-2">Profil</a>
        <a href="#" onclick="setSection(this)" aria-label="history-collage" style="max-width: fit-content" class="btn mx-2">Riwayat Pendidikan</a>
        <a href="#" onclick="setSection(this)" aria-label="research" style="max-width: fit-content" class="btn mx-2">Penelitian</a>
        <a href="#" onclick="setSection(this)" aria-label="community-service" style="max-width: fit-content" class="btn mx-2">Pengabdian</a>
        <a href="#" onclick="setSection(this)" aria-label="article" style="max-width: fit-content" class="btn mx-2">Artikel Ilmiah</a>
        <a href="#" onclick="setSection(this)" aria-label="seminar" style="max-width: fit-content" class="btn mx-2">Seminar</a>
        <a href="#" onclick="setSection(this)" aria-label="book" style="max-width: fit-content" class="btn mx-2">Karya Buku</a>
        <a href="#" onclick="setSection(this)" aria-label="copyright" style="max-width: fit-content" class="btn mx-2">HKI</a>
        <a href="#" onclick="setSection(this)" aria-label="award" style="max-width: fit-content" class="btn mx-2">Penghargaan</a>
      </div>

      <!-- Profile Section -->
      <div class="row custom-section" id="profile">
        <div class="card shadow-sm my-4">
          <div class="card-body fw-light">{{ $dataStaff->nama_lengkap }} Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error dignissimos atque quas aut pariatur tenetur quos consequuntur qui ea at dolorem sapiente totam numquam, odit fuga quisquam corporis modi ratione! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa porro doloremque quaerat. Voluptate ratione enim illo, commodi, consectetur mollitia ipsa nesciunt quasi, ducimus corporis iure! Debitis ratione atque quos omnis!</div>
        </div>
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">CONTOH JUDUL PROFIL (UPPERCASE)</div>
          <div class="card-body fw-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, beatae veniam quia magnam architecto iste necessitatibus culpa totam vitae tempore, consequuntur, ipsam nam eaque harum maiores error saepe maxime officiis!</div>
        </div>
      </div>

      <!-- History of College Section -->
      <div class="row custom-section d-none" id="history-collage">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">CONTOH JUDUL RIWAYAT PENDIDIKAN (UPPERCASE)</div>
          <div class="card-body fw-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, beatae veniam quia magnam architecto iste necessitatibus culpa totam vitae tempore, consequuntur, ipsam nam eaque harum maiores error saepe maxime officiis!</div>
        </div>
      </div>

      <!-- Research Section -->
      <div class="row custom-section d-none" id="research">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">CONTOH JUDUL PENELITIAN (UPPERCASE)</div>
          <div class="card-body fw-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, beatae veniam quia magnam architecto iste necessitatibus culpa totam vitae tempore, consequuntur, ipsam nam eaque harum maiores error saepe maxime officiis!</div>
        </div>
      </div>

      <!-- Community Service Section -->
      <div class="row custom-section d-none" id="community-service">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">CONTOH JUDUL PENGABDIAN (UPPERCASE)</div>
          <div class="card-body fw-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, beatae veniam quia magnam architecto iste necessitatibus culpa totam vitae tempore, consequuntur, ipsam nam eaque harum maiores error saepe maxime officiis!</div>
        </div>
      </div>

      <!-- Article Section -->
      <div class="row custom-section d-none" id="article">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">CONTOH JUDUL ARTIKEL (UPPERCASE)</div>
          <div class="card-body fw-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, beatae veniam quia magnam architecto iste necessitatibus culpa totam vitae tempore, consequuntur, ipsam nam eaque harum maiores error saepe maxime officiis!</div>
        </div>
      </div>

      <!-- Seminar Section -->
      <div class="row custom-section d-none" id="seminar">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">CONTOH JUDUL SEMINAR (UPPERCASE)</div>
          <div class="card-body fw-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, beatae veniam quia magnam architecto iste necessitatibus culpa totam vitae tempore, consequuntur, ipsam nam eaque harum maiores error saepe maxime officiis!</div>
        </div>
      </div>

      <!-- Book Section -->
      <div class="row custom-section d-none" id="book">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">CONTOH JUDUL KARYA BUKU (UPPERCASE)</div>
          <div class="card-body fw-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, beatae veniam quia magnam architecto iste necessitatibus culpa totam vitae tempore, consequuntur, ipsam nam eaque harum maiores error saepe maxime officiis!</div>
        </div>
      </div>

      <!-- HKI Section -->
      <div class="row custom-section d-none" id="copyright">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">CONTOH JUDUL HKI (UPPERCASE)</div>
          <div class="card-body fw-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, beatae veniam quia magnam architecto iste necessitatibus culpa totam vitae tempore, consequuntur, ipsam nam eaque harum maiores error saepe maxime officiis!</div>
        </div>
      </div>

      <!-- Awards Section -->
      <div class="row custom-section d-none" id="award">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">CONTOH JUDUL PENGHARGAAN (UPPERCASE)</div>
          <div class="card-body fw-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, beatae veniam quia magnam architecto iste necessitatibus culpa totam vitae tempore, consequuntur, ipsam nam eaque harum maiores error saepe maxime officiis!</div>
        </div>
      </div>

    </div>
  </section><!-- /Starter Section Section -->

  <script>
    function setSection(element) {
      let customElementHide = document.querySelectorAll('.custom-section');
      for(var i = 0; i < customElementHide.length; i++) {
        customElementHide[i].classList.add('d-none');
      }

      let customElementShow = document.getElementById(element.getAttribute('aria-label'));
      customElementShow.classList.remove('d-none');

      let allBtn = document.querySelectorAll('.btn.mx-2');
      for(var i = 0; i < allBtn.length; i++) {
        allBtn[i].classList.remove('btn-primary');
      }
      element.classList.add('btn-primary');
    }
  </script>
@endsection