<header id="header" class="header sticky-top">
  <div class="branding d-flex align-items-center">
    <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="{{ route('landing') }}" class="logo d-flex align-items-center me-auto">
        {{-- <img src="{{ asset('assets/img/logo.png') }}" alt=""> --}}
        <h1 class="sitename">LAB KSI</h1>
      </a>
      @if (Auth::check())
        <a class="d-none d-sm-block" href="{{ route('dashboard.index') }}">{{ Auth::user()->name }}</a>
      @else
        <a class="cta-btn d-none d-sm-block" href="{{ route('login.index') }}">Login</a>
      @endif
      <nav id="navmenu" class="navmenu">
        <ul>
          <li class="dropdown"><a href="#"><span>Language</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">EN</a></li>
              <li><a href="#">ID</a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </div>
</header>