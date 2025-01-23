<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>LAB KSI Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="{{ asset('assets/admin/dist/css/styles.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="main.js"></script>
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body class="sb-nav-fixed">
  @include('layouts/admin/navbar/index')
  <div id="layoutSidenav">
    @include('layouts/admin/sidebar/index')
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          @yield('content')
        </div>
      </main>
      @include('layouts/admin/footer/index')
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/admin/dist/js/scripts.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/admin/dist/assets/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('assets/admin/dist/assets/demo/chart-bar-demo.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/admin/dist/js/datatables-simple-demo.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
    });
  </script>
</body>
</html>