@extends('layouts.admin.app')
@section('content')
  @csrf
  <h1 class="mt-4">Data Seminar</h1>
  <hr>
  <a href="" onclick="addModal()" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary"><i class="fas fa-add me-2"></i>Tambah Data</a>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
        <thead>
          <tr>
            {{-- id_seminar
              nama_pertemuan
              judul_seminar
              tahun
              tempat
              link_seminar
              id_staff --}}
            <th>No</th>
            <th>Nama Pemilik</th>
            <th>Nama Pertemuan</th>
            <th>Judul Seminar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
          @php $i = 0; @endphp
          @foreach ($dataSeminar as $item)
            <tr>
              <td>{{ $i + 1 }}</td>
              <td>{{ $dataStaff[$i]->gelar_depan }} {{ $dataStaff[$i]->nama_lengkap }} {{ $dataStaff[$i]->gelar_belakang }}</td>
              <td>{{ $item->nama_pertemuan }}</td>
              <td>{{ $item->judul_seminar }}</td>
              <td class="d-flex">
                <a href="" class="btn btn-secondary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick="showModal('{{ $item->id_seminar }}')"><i class="fas fa-eye"></i></a>
                <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editModal('{{ $item->id_seminar }}')"><i class="fas fa-edit"></i></a>
                <a href="" class="btn btn-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModal('{{ $item->id_seminar }}')"><i class="fas fa-trash-can"></i></a>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Seminar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              {{-- id_seminar
                nama_pertemuan
                judul_seminar
                tahun
                tempat
                link_seminar
                id_staff --}}
              <tr>
                <th>Nama Pemilik</th>
                <td id="nama_pemilik"></td>
              </tr>
              <tr>
                <th>Nama Pertemuan</th>
                <td id="nama_pertemuan"></td>
              </tr>
              <tr>
                <th>Judul Seminar</th>
                <td id="judul_seminar"></td>
              </tr>
              <tr>
                <th>Tahun</th>
                <td id="tahun"></td>
              </tr>
              <tr>
                <th>Tempat</th>
                <td id="tempat"></td>
              </tr>
              <tr>
                <th>Link Seminar</th>
                <td>
                  <a href="" id="link_seminar"></a>
                </td>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Seminar</h1>
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
                <th>Nama Pertemuan</th>
                <td id="nama_pertemuan">
                  <input type="text" name="nama_pertemuan-add" id="nama_pertemuan-add" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Judul Seminar</th>
                <td>
                  <input type="text" name="judul_seminar-add" id="judul_seminar-add" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Tahun</th>
                <td id="tahun">
                  <select name="tahun-add" id="tahun-add" class="form-select"></select>
                </td>
              </tr>
              <tr>
                <th>Tempat</th>
                <td>
                  <input type="text" name="tempat-add" id="tempat-add" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Link Seminar</th>
                <td>
                  <input type="text" name="link_seminar-add" id="link_seminar-add" class="form-control">
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Seminar</h1>
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
                <th>Nama Pertemuan</th>
                <td id="nama_pertemuan">
                  <input type="text" name="nama_pertemuan-edit" id="nama_pertemuan-edit" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Judul Seminar</th>
                <td>
                  <input type="text" name="judul_seminar-edit" id="judul_seminar-edit" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Tahun</th>
                <td id="tahun">
                  <select name="tahun-edit" id="tahun-edit" class="form-select"></select>
                </td>
              </tr>
              <tr>
                <th>Tempat</th>
                <td>
                  <input type="text" name="tempat-edit" id="tempat-edit" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Link Seminar</th>
                <td>
                  <input type="text" name="link_seminar-edit" id="link_seminar-edit" class="form-control">
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

    function setGelarInName(gelar_depan, nama, gelar_belakang) {
      return gelar_depan + " " + nama + " " + gelar_belakang;
    }

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
          let route = "{{ route('seminar.destroy', ['seminar' => '__ID__']) }}";
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
            let fieldPertemuan = document.getElementById('nama_pertemuan-edit');
            let fieldJudul = document.getElementById('judul_seminar-edit');
            let fieldTahun = document.getElementById('tahun-edit');
            let fieldTempat = document.getElementById('tempat-edit');
            let fieldLink = document.getElementById('link_seminar-edit');

            fieldPemilik.innerHTML = `<option value="${data.dataStaff.id_staff}">${setGelarInName(data.dataStaff.gelar_depan, data.dataStaff.nama_lengkap, data.dataStaff.gelar_belakang)}</option>`;
            fieldPertemuan.value = data.dataSeminar.nama_pertemuan;
            fieldJudul.value = data.dataSeminar.judul_seminar;
            fieldTempat.value = data.dataSeminar.tempat;
            fieldLink.value = data.dataSeminar.link_seminar;

            let date = new Date();
            fieldTahun.innerHTML = `<option value="not-selected">Pilih</option>`;
            for(var i = parseInt(date.getFullYear()); i >= 1980; i--) {
              if(i == parseInt(data.dataSeminar.tahun)) {
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

      let route = '{{ route("seminar.edit", ["seminar" => "__ID__"]) }}';
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
            data.dataSeminar.forEach(element => {
            tbody.innerHTML += `
              <tr>
                <td>${ i + 1 }</td>
                <td>${ setGelarInName(data.dataStaff[i].gelar_depan, data.dataStaff[i].nama_lengkap, data.dataStaff[i].gelar_belakang) }</td>
                <td>${ element.nama_pertemuan }</td>
                <td>${ element.judul_seminar }</td>
                <td class="d-flex">
                  <a href="" class="btn btn-secondary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick="showModal('${ element.id_seminar }')"><i class="fas fa-eye"></i></a>
                  <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editModal('${ element.id_seminar }')"><i class="fas fa-edit"></i></a>
                  <a href="" class="btn btn-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModal('${ element.id_seminar }')"><i class="fas fa-trash-can"></i></a>
                </td>
              </tr>
            `;
            i++;
            });
          }
        }
      };

      xhttp.open('GET', '{{ route("seminar.getSeminar") }}', true);
      xhttp.send();
    }

    function addModal() {
      let xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            let fieldPemilik = document.getElementById('nama_pemilik-add');
            fieldPemilik.innerHTML = `<option value="not-selected" selected>Pilih</option>`;
            data.dataStaff.forEach(element => {
              fieldPemilik.innerHTML += `<option value="${element.id_staff}">${setGelarInName(element.gelar_depan, element.nama_lengkap, element.gelar_belakang)}</option>`;
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
      let fieldPertemuan = document.getElementById('nama_pertemuan-add').value;
      let fieldJudul = document.getElementById('judul_seminar-add').value;
      let fieldTahun = document.getElementById('tahun-add').value;
      let fieldTempat = document.getElementById('tempat-add').value;
      let fieldLink = document.getElementById('link_seminar-add').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('nama_pemilik', fieldPemilik);
      formData.append('nama_pertemuan', fieldPertemuan);
      formData.append('judul_seminar', fieldJudul);
      formData.append('tahun', fieldTahun);
      formData.append('tempat', fieldTempat);
      formData.append('link_seminar', fieldLink);
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

      xhttp.open('POST', '{{ route("seminar.store") }}', true);
      xhttp.send(formData);
    }

    function editData() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      let fieldPemilik = document.getElementById('nama_pemilik-edit').value;
      let fieldPertemuan = document.getElementById('nama_pertemuan-edit').value;
      let fieldJudul = document.getElementById('judul_seminar-edit').value;
      let fieldTahun = document.getElementById('tahun-edit').value;
      let fieldTempat = document.getElementById('tempat-edit').value;
      let fieldLink = document.getElementById('link_seminar-edit').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('nama_pemilik', fieldPemilik);
      formData.append('nama_pertemuan', fieldPertemuan);
      formData.append('judul_seminar', fieldJudul);
      formData.append('tahun', fieldTahun);
      formData.append('tempat', fieldTempat);
      formData.append('link_seminar', fieldLink);
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

      let route = '{{ route("seminar.update", ["seminar" => "__ID__"]) }}';
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
            let fieldPertemuan = document.getElementById('nama_pertemuan');
            let fieldJudul = document.getElementById('judul_seminar');
            let fieldTahun = document.getElementById('tahun');
            let fieldTempat = document.getElementById('tempat');
            let fieldLink = document.getElementById('link_seminar');

            fieldPemilik.innerText = setGelarInName(data.dataStaff.gelar_depan, data.dataStaff.nama_lengkap, data.dataStaff.gelar_belakang);
            fieldPertemuan.innerText = data.dataSeminar.nama_pertemuan;
            fieldJudul.innerText = data.dataSeminar.judul_seminar;
            fieldTahun.innerText = data.dataSeminar.tahun;
            fieldTempat.innerText = data.dataSeminar.tempat;
            fieldLink.innerText = data.dataSeminar.link_seminar;
            fieldLink.setAttribute('href', data.dataSeminar.link_seminar);
          } else {
            Swal.fire('Kesalahan', 'Terjadi error, coba lagi nanti!', 'error');
          }
        }
      };

      let route = '{{ route("seminar.show", ["seminar" => "__ID__"]) }}';
      xhttp.open('GET', route.replace('__ID__', id), true);
      xhttp.send();
    }
  </script>
@endsection