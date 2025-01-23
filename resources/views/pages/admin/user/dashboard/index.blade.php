@extends('layouts.admin.app')
@section('content')
  <h1 class="mt-4">Selamat Datang</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Admin Lab KSI</li>
  </ol>
  <div class="row">
    <div class="col-xl-3 col-md-6">
      <div class="card bg-primary text-white mb-4">
        <div class="card-body">Staff</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <a class="small text-white stretched-link" href="">Data Staff</a>
          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card bg-warning text-white mb-4">
        <div class="card-body">Penelitian</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <a class="small text-white stretched-link" href=".?hal=galeri">Data Penelitian</a>
          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card bg-success text-white mb-4">
        <div class="card-body">Riwayat Pendidikan</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <a class="small text-white stretched-link" href=".?hal=berita">Data Riwayat Pendidikan</a>
          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card bg-danger text-white mb-4">
        <div class="card-body">Pengabdian</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <a class="small text-white stretched-link" href=".?hal=user">Data Data Pengabdian</a>
          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
      </div>
    </div>
  </div>
  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Contoh Data Tabel
    </div>
    <div class="card-body">
    </div>
  </div>
@endsection