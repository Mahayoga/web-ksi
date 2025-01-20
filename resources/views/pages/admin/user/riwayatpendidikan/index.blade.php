@extends('layouts.admin.app')
@section('content')
  <h1 class="mt-4">Data Riwayat Pendidikan</h1>
  <hr>
  <a href="{{ route('riwayatpendidikan.create') }}" class="btn btn-primary"><i class="fas fa-add me-2"></i>Tambah Data</a>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Perguruan Tinggi</th>
            <th>Bidang Ilmu</th>
            <th>Periode</th>
            <th>Gelar</th>
            <th>Pembimbing</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @php $i = 1; @endphp
            @foreach ($dataRiwayat as $item)
              <td>{{ $i }}</td>
              <td>{{ $item->nama_perguruan_tinggi }}</td>
              <td>{{ $item->bidang_ilmu }}</td>
              <td>{{ $item->tahun_masuk }} - {{ $item->tahun_lulus }}</td>
              <td>{{ $item->lulusan }}</td>
              <td>{{ $dataPembimbing[$i - 1]->nama_lengkap }} {{ $dataPembimbing[$i - 1]->gelar }}</td>
              <td class="d-flex">
                <a href="{{ route('riwayatpendidikan.show', ['riwayatpendidikan' => $item->id_riwayat]) }}" class="btn btn-primary p-2 mx-1"><i class="fas fa-eye"></i></a>
                <a href="{{ route('riwayatpendidikan.edit', ['riwayatpendidikan' => $item->id_riwayat]) }}" class="btn btn-primary p-2 mx-1"><i class="fas fa-user-pen"></i></a>
                <a href="{{ route('riwayatpendidikan.destroy', ['riwayatpendidikan' => $item->id_riwayat]) }}" class="btn btn-danger p-2 mx-1"><i class="fas fa-trash-can"></i></a>
              </td>
              @php $i += 1; @endphp
            @endforeach
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection