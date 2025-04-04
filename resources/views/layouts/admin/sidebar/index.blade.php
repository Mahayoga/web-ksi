<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
      <div class="nav">
        <div class="sb-sidenav-menu-heading">Menu</div>
        <a class="nav-link" href=".?hal=beranda">
          <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
          Beranda
        </a>
        <a class="nav-link" href="{{ route('dashboard') }}">
          <div class="sb-nav-link-icon"><i class="fas fa-dashboard"></i></div>
          Dashboard
        </a>
        <div class="sb-sidenav-menu-heading">Data</div>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
          <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
          Data Utama
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            @if (Auth::user()->role == 'admin')
              <a class="nav-link" href="{{ route('staff.index') }}">Staff</a>
            @endif
            <a class="nav-link" href="{{ route('riwayatpendidikan.index') }}">Riwayat Pendidikan</a>
            <a class="nav-link" href="{{ route('penelitian.index') }}">Penelitian</a>
            <a class="nav-link" href="{{ route('pengabdian.index') }}">Pengabdian</a>
            <a class="nav-link" href="{{ route('artikelilmiah.index') }}">Artikel Ilmiah</a>
            <a class="nav-link" href="{{ route('seminar.index') }}">Seminar</a>
            <a class="nav-link" href="{{ route('karyabuku.index') }}">Karya Buku</a>
            <a class="nav-link" href="{{ route('hki.index') }}">HKI</a>
            <a class="nav-link" href="{{ route('penghargaan.index') }}">Penghargaan</a>
          </nav>
        </div>

        <div class="sb-sidenav-menu-heading">Lain-Lain</div>
        <a class="nav-link" href="{{ route('logout') }}">
          <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
          Keluar
        </a>
      </div>
    </div>
    <div class="sb-sidenav-footer">
      <div class="small">Login:</div>
      {{-- < $_SESSION['namauser'] ?> --}}
    </div>
  </nav>
</div>