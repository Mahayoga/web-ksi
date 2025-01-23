@extends('layouts.admin.app')
@section('content')
  @csrf
  <h1 class="mt-4">Data Pengabdian</h1>
  <hr>
  <a href="" onclick="addModal()" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary"><i class="fas fa-add me-2"></i>Tambah Data</a>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
        <thead>
          <tr>
            {{-- id_penghargaan
            jenis_penghargaan
            pemberi
            penghargaan
            tahun
            id_staff --}}
            <th>No</th>
            <th>Nama Pemilik</th>
            <th>Jenis Penghargaan</th>
            <th>Pemberi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
          @php $i = 0; @endphp
          @foreach ($dataPenghargaan as $item)
            <tr>
              <td>{{ $i + 1 }}</td>
              <td>{{ $dataStaff[$i]->nama_lengkap }} {{ $dataStaff[$i]->gelar }}</td>
              <td>{{ $item->jenis_penghargaan }}</td>
              <td>{{ $dataKampus[$i]->nama_kampus }}</td>
              <td class="d-flex">
                <a href="" class="btn btn-secondary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick="showModal('{{ $item->id_penghargaan }}')"><i class="fas fa-eye"></i></a>
                <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editModal('{{ $item->id_penghargaan }}')"><i class="fas fa-edit"></i></a>
                <a href="" class="btn btn-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModal('{{ $item->id_penghargaan }}')"><i class="fas fa-trash-can"></i></a>
              </td>
            </tr>
            @php $i++; @endphp
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Show Modal -->
  <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pengabdian</h1>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pengabdian</h1>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pengabdian</h1>
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
    let idEdit = null;
    let idHapus = null;
    function deleteModal(id) {
      idHapus = id;
      let xhttp = new XMLHttpRequest();
      Swal.fire({
        title: "Apakah anda ingin menghapus data ini?",
        showDenyButton: true,
        denyButtonText: "Hapus",
        confirmButtonText: "Batal",
        icon: "question"
      }).then((result) => {
        if (result.isDenied) {
          xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
              let data = JSON.parse(this.responseText);
              if(data.status == 'success') {
                Swal.fire("Berhasil", "Berhasil menghapus data!", "success");
                getData();
              } else {
                Swal.fire("Error", "Terjadi error saat menghapus data!" + data.msg, "error");
              }
            }
          };

          let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
          let route = "{{ route('penghargaan.destroy', ['penghargaan' => '__ID__']) }}";
          xhttp.open('DELETE', route.replace('__ID__', idHapus), true);
          xhttp.setRequestHeader('X-CSRF-TOKEN', token);
          xhttp.send();
        }
      });
    }

    function editModal(id) {
      let xhttp = new XMLHttpRequest();
      
      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            idEdit = id;
            let fieldPemilik = document.getElementById('nama_pemilik-edit');
            let fieldJenis = document.getElementById('jenis_penghargaan-edit');
            let fieldPemberi = document.getElementById('pemberi-edit');
            let fieldPenghargaan = document.getElementById('penghargaan-edit');
            let fieldTahun = document.getElementById('tahun-edit');

            fieldPemilik.innerHTML = `<option value="${data.dataStaff.id_staff}">${data.dataStaff.nama_lengkap} ${data.dataStaff.gelar}</option>`;
            fieldJenis.value = data.dataPenghargaan.jenis_penghargaan;

            fieldPemberi.innerHTML = `<option value="not-selected">Pilih</option>`;
            data.dataKampus.forEach(element => {
              if(element.id_kampus == data.dataPenghargaan.id_kampus) {
                fieldPemberi.innerHTML += `<option value="${element.id_kampus}" selected>${element.nama_kampus}</option>`;
              } else {
                fieldPemberi.innerHTML += `<option value="${element.id_kampus}">${element.nama_kampus}</option>`;
              }
            });

            fieldPenghargaan.value = data.dataPenghargaan.penghargaan;

            let date = new Date();
            fieldTahun.innerHTML = `<option value="not-selected">Pilih</option>`;
            for(var i = parseInt(date.getFullYear()); i >= 1980; i--) {
              if(i == parseInt(data.dataPenghargaan.tahun)) {
                fieldTahun.innerHTML += `
                  <option value="${i}" selected>${i}</option>
                `;
              } else {
                fieldTahun.innerHTML += `
                  <option value="${i}">${i}</option>
                `;
              }
            }
          }
        }
      };

      let route = '{{ route("penghargaan.edit", ["penghargaan" => "__ID__"]) }}';
      xhttp.open('GET', route.replace('__ID__', id), true);
      xhttp.send();
    }

    function getData() {
      let xhttp = new XMLHttpRequest();
      let tbody = document.querySelector('tbody');

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            tbody.innerHTML = '';
            let i = 0;
            data.dataPenghargaan.forEach(element => {
            tbody.innerHTML += `
              <tr>
                <td>${ i + 1 }</td>
                <td>${ data.dataStaff[i].nama_lengkap } ${ data.dataStaff[i].gelar }</td>
                <td>${ element.jenis_penghargaan }</td>
                <td>${ data.dataKampus[i].nama_kampus }</td>
                <td class="d-flex">
                  <a href="" class="btn btn-secondary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick="showModal('${ element.id_penghargaan }')"><i class="fas fa-eye"></i></a>
                  <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editModal('${ element.id_penghargaan }')"><i class="fas fa-edit"></i></a>
                  <a href="" class="btn btn-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModal('${ element.id_penghargaan }')"><i class="fas fa-trash-can"></i></a>
                </td>
              </tr>
            `;
            i++;
            });
          }
        }
      };

      xhttp.open('GET', '{{ route("penghargaan.getPenghargaan") }}', true);
      xhttp.send();
    }

    function addModal() {
      let xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            let fieldPemilik = document.getElementById('nama_pemilik-add');
            let fieldKampus = document.getElementById('pemberi-add');
            fieldPemilik.innerHTML = `<option value="not-selected" selected>Pilih</option>`;
            fieldKampus.innerHTML = `<option value="not-selected" selected>Pilih</option>`;
            data.dataStaff.forEach(element => {
              fieldPemilik.innerHTML += `<option value="${element.id_staff}">${element.nama_lengkap}</option>`;
            });
            data.dataKampus.forEach(element => {
              fieldKampus.innerHTML += `<option value="${element.id_kampus}">${element.nama_kampus}</option>`;
            });
            let tahun = document.getElementById('tahun-add');
            let date = new Date();
            tahun.innerHTML = `<option value="not-selected">Pilih</option>`;
            for(var i = parseInt(date.getFullYear()); i >= 1980; i--) {
              tahun.innerHTML += `
                <option value="${i}">${i}</option>
              `;
            }
          }
        }
      };

      xhttp.open('GET', '{{ route("penghargaan.create") }}', true);
      xhttp.send();
    }

    function addData() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      let fieldPemilik = document.getElementById('nama_pemilik-add').value;
      let fieldJenis = document.getElementById('jenis_penghargaan-add').value;
      let fieldPemberi = document.getElementById('pemberi-add').value;
      let fieldPenghargaan = document.getElementById('penghargaan-add').value;
      let fieldTahun = document.getElementById('tahun-add').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('nama_pemilik', fieldPemilik);
      formData.append('jenis_penghargaan', fieldJenis);
      formData.append('pemberi', fieldPemberi);
      formData.append('penghargaan', fieldPenghargaan);
      formData.append('tahun', fieldTahun);
      formData.append('_token', token);

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            Swal.fire('Berhasil', 'Tambah data berhasil!', 'success');
            getData();
          } else {
            Swal.fire('Kesalahan', 'Terjadi error, coba lagi nanti!', 'error');
          }
        }
      };

      xhttp.open('POST', '{{ route("penghargaan.store") }}', true);
      xhttp.send(formData);
    }

    function editData() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      let fieldPemilik = document.getElementById('nama_pemilik-edit').value;
      let fieldJenis = document.getElementById('jenis_penghargaan-edit').value;
      let fieldPemberi = document.getElementById('pemberi-edit').value;
      let fieldPenghargaan = document.getElementById('penghargaan-edit').value;
      let fieldTahun = document.getElementById('tahun-edit').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('nama_pemilik', fieldPemilik);
      formData.append('jenis_penghargaan', fieldJenis);
      formData.append('pemberi', fieldPemberi);
      formData.append('penghargaan', fieldPenghargaan);
      formData.append('tahun', fieldTahun);
      formData.append('_token', token);
      formData.append('_method', 'PATCH');

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            Swal.fire({
              title: "Berhasil",
              text: "Berhasil mengedit data!",
              icon: "success"
            });
            getData();
          } else {
            Swal.fire({
              title: "Error",
              text: "Terdapat error, silahkan coba lagi nanti!",
              icon: "error"
            });
          }
        }
      };

      let route = '{{ route("penghargaan.update", ["penghargaan" => "__ID__"]) }}';
      xhttp.open('POST', route.replace('__ID__', idEdit));
      xhttp.send(formData);
    }

    function showModal(id) {
      let xhttp = new XMLHttpRequest();
      
      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            let fieldPemilik = document.getElementById('nama_pemilik');
            let fieldJenis = document.getElementById('jenis_penghargaan');
            let fieldPemberi = document.getElementById('pemberi');
            let fieldPenghargaan = document.getElementById('penghargaan');
            let fieldTahun = document.getElementById('tahun');

            fieldPemilik.innerText = data.dataStaff.nama_lengkap + " " + data.dataStaff.gelar;
            fieldJenis.innerText = data.dataPenghargaan.jenis_penghargaan;
            fieldPemberi.innerText = data.dataKampus.nama_kampus;
            fieldPenghargaan.innerText = data.dataPenghargaan.penghargaan;
            fieldTahun.innerText = data.dataPenghargaan.tahun;
          } else {
            Swal.fire('Kesalahan', 'Terjadi error, coba lagi nanti!', 'error');
          }
        }
      };

      let route = '{{ route("penghargaan.show", ["penghargaan" => "__ID__"]) }}';
      xhttp.open('GET', route.replace('__ID__', id), true);
      xhttp.send();
    }
  </script>
@endsection