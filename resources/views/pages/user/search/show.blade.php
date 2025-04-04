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
              <img src="{{ asset('storage/' . $dataStaff->profile_image) }}" alt="profil" class="w-100">
            </div>
            <div class="col-md-7">
              <p class="fs-4 text-primary-emphasis fw-bold">{{ $dataStaff->gelar_depan }} {{ $dataStaff->nama_lengkap }} {{ $dataStaff->gelar_belakang }}</script></p>
              <p class="fs-6 light">EDUCATION/ EDUCATIONAL TECHNOLOGY AND COMPUTING/ SPECIALIST STUDIES IN EDUCATION</p>
              <div class="row text-primary-emphasis fw-light">
                <div class="col-md-1 pe-1">
                  <span class="material-symbols-outlined">domain</span>
                </div>
                <div class="col-md-11 ps-0">
                  <span>{{ $dataStaff->kantor->nama_kantor }}</span>
                </div>
              </div>
              <div class="row text-primary-emphasis fw-light">
                <div class="col-md-1 pe-1">
                  <span class="material-symbols-outlined">location_on</span>
                </div>
                <div class="col-md-11 ps-0">
                  <span>{{ $dataStaff->kantor->nama_kantor }}, {{ $dataKantor->nama_kantor }}, {{ $dataStaff->kantor->alamat_kantor }}</span>
                </div>
              </div>
              <div class="row text-primary-emphasis fw-light">
                <div class="col-md-1 pe-1">
                  <span class="material-symbols-outlined">mail</span>
                </div>
                <div class="col-md-11 ps-0">
                  <span>{{ $dataStaff->users->email }}</span>
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
        {{-- 
        1. Deskripsi (sepertinya sudah)
        2. Bidang yang diminati
        3. Latar belakang edukasi (Education Background)
        4. Penelitian yang tertarik (Research Interest)
        5. Beasiswa
        6. Sertifikasi
        --}}
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">DETAIL PROFIL</div>
          <div class="card-body fw-light">{{ $dataStaff->deskripsi }}</div>
        </div>
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">BIDANG YANG DIMINATI</div>
          <div class="card-body fw-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur enim blanditiis in praesentium totam facilis dolorum laboriosam eos, neque eaque repudiandae doloremque iusto ut alias dignissimos veniam aliquid amet ratione!</div>
        </div>
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">LATAR BELAKANG EDUKASI</div>
          <div class="card-body fw-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur enim blanditiis in praesentium totam facilis dolorum laboriosam eos, neque eaque repudiandae doloremque iusto ut alias dignissimos veniam aliquid amet ratione!</div>
        </div>
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">BIDANG YANG DIMINATI</div>
          <div class="card-body fw-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur enim blanditiis in praesentium totam facilis dolorum laboriosam eos, neque eaque repudiandae doloremque iusto ut alias dignissimos veniam aliquid amet ratione!</div>
        </div>
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">BEASISWA</div>
          <div class="card-body fw-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur enim blanditiis in praesentium totam facilis dolorum laboriosam eos, neque eaque repudiandae doloremque iusto ut alias dignissimos veniam aliquid amet ratione!</div>
        </div>
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">SERTIFIKASI</div>
          <div class="card-body fw-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur enim blanditiis in praesentium totam facilis dolorum laboriosam eos, neque eaque repudiandae doloremque iusto ut alias dignissimos veniam aliquid amet ratione!</div>
        </div>
      </div>

      <!-- History of College Section -->
      <div class="row custom-section d-none" id="history-collage">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">RIWAYAT PENDIDIKAN</div>
          <div class="card-body fw-light">
            @foreach ($dataRiwayatPendidikan as $item)
              <div>
                {{ $item->lulusan }} {{ $item->bidang_ilmu->nama_bidang_ilmu }}, {{ $item->kampus->nama_kampus }} ({{ $item->tahun_masuk }} - {{ $item->tahun_lulus }})
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- Research Section -->
      <div class="row custom-section d-none" id="research">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">PENELITIAN</div>
          <div class="card-body fw-light">
            @foreach ($dataPenelitian as $item)
              <div>
                {{ $item->judul_penelitian }}, {{ $item->tahun_penelitian }}
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- Community Service Section -->
      <div class="row custom-section d-none" id="community-service">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">PENGABDIAN</div>
          <div class="card-body fw-light">
            @foreach ($dataPengabdian as $item)
              <div>
                {{ $item->judul_pengabdian }}, {{ $item->tahun_pengabdian }}
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- Article Section -->
      <div class="row custom-section d-none" id="article">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">ARTIKEL</div>
          <div class="card-body fw-light">
            @foreach ($dataArtikel as $item)
              <div>
                <a href="{{ $item->link_artikel }}">{{ $item->judul_artikel }} </a>({{ $item->tahun }})
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- Seminar Section -->
      <div class="row custom-section d-none" id="seminar">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">SEMINAR</div>
          <div class="card-body fw-light">
            @foreach ($dataSeminar as $item)
              <div>
                <a href="{{ $item->link_seminar }}">{{ $item->judul_seminar }}, </a>{{ $item->tempat }} ({{ $item->tahun }})
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- Book Section -->
      <div class="row custom-section d-none" id="book">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">KARYA BUKU</div>
          <div class="card-body fw-light">
            @foreach ($dataBuku as $item)
              <div>
                {{ $item->judul_buku }} ({{ $item->tahun }})
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- HKI Section -->
      <div class="row custom-section d-none" id="copyright">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">HKI</div>
          <div class="card-body fw-light">
            @foreach ($dataHKI as $item)
              <div>
                <a href="{{ $item->link_hki }}">{{ $item->judul_hki }}</a> ({{ $item->tanggal }})
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- Awards Section -->
      <div class="row custom-section d-none" id="award">
        <div class="card shadow-sm p-3 my-4">
          <div class="card-title text-primary-emphasis fw-bold">PENGHARGAAN</div>
          <div class="card-body fw-light">
            @foreach ($dataPenghargaan as $item)
              <div>
                {{ $item->jenis_penghargaan }}, {{ $item->penghargaan }} - {{ $item->kampus->nama_kampus }} ({{ $item->tahun }})
              </div>
            @endforeach
          </div>
        </div>
      </div>

    </div>
  </section><!-- /Starter Section Section -->

  <script>
    function setGelarInName(gelar_depan, nama, gelar_belakang) {
      return gelar_depan + " " + nama + " " + gelar_belakang;
    }

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