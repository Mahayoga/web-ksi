@extends('layouts.admin.app')
@section('content')
  <div class="row my-4">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body d-flex justify-content-center">
          <img src="{{ asset('storage/' . $dataStaff->profile_image) }}" class="card-img-top rounded-circle" style="max-width: 50%">
        </div>
        <div class="card-body">
          <div class="fs-3 text-center">{{ $dataStaff->nama_lengkap }}, {{ $dataStaff->gelar }}</div>
          <div class="fs-6 text-secondary text-center">{{ $dataKantor->nama_kantor }}</div>
          <div class="fs-6 text-secondary text-center">{{ $dataKampus->nama_kampus }}</div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <table class="table">
            <tbody>
              <tr>
                <th>Nama Lengkap</th>
                <td class="text-secondary">{{ $dataStaff->nama_lengkap }}</td>
              </tr>
              <tr>
                <th>NIP</th>
                <td class="text-secondary">{{ $dataStaff->NIP }}</td>
              </tr>
              <tr>
                <th>NIDN</th>
                <td class="text-secondary">{{ $dataStaff->NIDN }}</td>
              </tr>
              <tr>
                <th>Jabatan Fungsional</th>
                <td class="text-secondary">{{ $dataStaff->jabatan_fungsional }}</td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td class="text-secondary">{{ $dataStaff->jenis_kelamin }}</td>
              </tr>
              <tr>
                <th>Tempat Lahir</th>
                <td class="text-secondary">{{ $dataStaff->tempat_lahir }}</td>
              </tr>
              <tr>
                <th>Tanggal Lahir</th>
                <td class="text-secondary">{{ $dataStaff->tanggal_lahir }}</td>
              </tr>
              <tr>
                <th>Nomor Telepon</th>
                <td class="text-secondary">{{ $dataStaff->nomor_telepon }}</td>
              </tr>
              <tr>
                <th>Fax</th>
                <td class="text-secondary">{{ $dataStaff->fax }}</td>
              </tr>
            </tbody>
          </table>
          <button type="button" class="btn btn-primary">Edit</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Show Modal -->
  <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Penghargaan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              {{-- id_penghargaan
              jenis_penghargaan
              pemberi
              penghargaan
              tahun
              id_staff --}}
              <tr>
                <th>Nama Pemilik</th>
                <td id="nama_pemilik"></td>
              </tr>
              <tr>
                <th>Jenis Penghargaan</th>
                <td id="jenis_penghargaan"></td>
              </tr>
              <tr>
                <th>Pemberi</th>
                <td id="pemberi"></td>
              </tr>
              <tr>
                <th>Penghargaan</th>
                <td id="penghargaan"></td>
              </tr>
              <tr>
                <th>Tahun Mendapatkan</th>
                <td id="tahun"></td>
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

  <!-- Add Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Penghargaan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>Nama Pemilik</th>
                <td>
                  <select name="nama_pemilik-add" id="nama_pemilik-add" class="form-select"></select>
                </td>
              </tr>
              <tr>
                <th>Jenis Penghargaan</th>
                <td id="">
                  <input type="text" name="jenis_penghargaan-add" id="jenis_penghargaan-add" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Pemberi</th>
                <td>
                  <select name="pemberi-add" id="pemberi-add" class="form-select"></select>
                </td>
              </tr>
              <tr>
                <th>Penghargaan</th>
                <td>
                  <input type="text" name="penghargaan-add" id="penghargaan-add" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Tahun Mendapatkan</th>
                <td>
                  <select name="tahun-add" id="tahun-add" class="form-select"></select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="addData()">Tambahkan!</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Penghargaan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>Nama Pemilik</th>
                <td>
                  <select disabled name="nama_pemilik-edit" id="nama_pemilik-edit" class="form-select"></select>
                </td>
              </tr>
              <tr>
                <th>Jenis Penghargaan</th>
                <td id="">
                  <input type="text" name="jenis_penghargaan-edit" id="jenis_penghargaan-edit" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Pemberi</th>
                <td>
                  <select name="pemberi-edit" id="pemberi-edit" class="form-select"></select>
                </td>
              </tr>
              <tr>
                <th>Penghargaan</th>
                <td>
                  <input type="text" name="penghargaan-edit" id="penghargaan-edit" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Tahun Mendapatkan</th>
                <td>
                  <select name="tahun-edit" id="tahun-edit" class="form-select"></select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="editData()">Edit!</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    
  </script>
@endsection