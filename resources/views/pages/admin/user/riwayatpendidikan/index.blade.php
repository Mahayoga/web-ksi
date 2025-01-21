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
                <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick="showModalRiwayat('{{ $item->id_riwayat }}')"><i class="fas fa-eye"></i></a>
              </td>
              @php $i += 1; @endphp
            @endforeach
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Show Modal -->
  <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Riwayat Pendidikan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>Nama Perguruan Tinggi</th>
                <td id="nama_perguruan_tinggi"></td>
              </tr>
              <tr>
                <th>Bidang Ilmu</th>
                <td id="bidang_ilmu"></td>
              </tr>
              <tr>
                <th>Tahun Masuk - Lulus</th>
                <td id="periode"></td>
              </tr>
              <tr>
                <th>Gelar</th>
                <td id="gelar"></td>
              </tr>
              <tr>
                <th>Penelitian</th>
                <td id="penelitian"></td>
              </tr>
              <tr>
                <th>Pembimbing</th>
                <td id="pembimbing"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function showModalRiwayat(id) {
      let xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          
          document.getElementById('nama_perguruan_tinggi').innerText = data.dataRiwayat.nama_perguruan_tinggi;
          document.getElementById('bidang_ilmu').innerText = data.dataRiwayat.bidang_ilmu;
          document.getElementById('periode').innerText = data.dataRiwayat.tahun_masuk + " - " + data.dataRiwayat.tahun_lulus;
          document.getElementById('gelar').innerText = data.dataRiwayat.lulusan;
          document.getElementById('penelitian').innerText = data.dataPenelitian.judul_penelitian;
          document.getElementById('pembimbing').innerText = data.dataPembimbing.nama_lengkap + " " + data.dataPembimbing.gelar;
        }
      };
      let data = "{{ route('riwayatpendidikan.show', ['riwayatpendidikan' => '__ID__']) }}";

      xhttp.open("GET", data.replace('__ID__', id), true);
      xhttp.send();
    }
  </script>
@endsection