@extends('layouts.admin.app')
@section('content')
  @csrf
  <h1 class="mt-4">Data HKI</h1>
  <hr>
  <a href="" onclick="addModal()" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary"><i class="fas fa-add me-2"></i>Tambah Data</a>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pemilik</th>
            <th>Judul HKI</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
          @php $i = 0; @endphp
          @foreach ($dataHKI as $item)
            <tr>
              <td>{{ $i + 1 }}</td>
              <td>{{ $dataStaff[$i]->nama_lengkap }} {{ $dataStaff[$i]->gelar }}</td>
              <td>{{ $item->judul_hki }}</td>
              <td>{{ $item->tanggal }}</td>
              <td class="d-flex">
                <a href="" class="btn btn-secondary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick="showModal('{{ $item->id_hki }}')"><i class="fas fa-eye"></i></a>
                <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editModal('{{ $item->id_hki }}')"><i class="fas fa-edit"></i></a>
                <a href="" class="btn btn-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModal('{{ $item->id_hki }}')"><i class="fas fa-trash-can"></i></a>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail HKI</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              {{-- id_hki 
                judul_hki
                tanggal
                jenis
                nomor_p
                nomor_id
                link_hki
                id_staff --}}
              <tr>
                <th>Nama Pemilik</th>
                <td id="nama_pemilik"></td>
              </tr>
              <tr>
                <th>Judul HKI</th>
                <td id="judul_hki"></td>
              </tr>
              <tr>
                <th>Tanggal</th>
                <td id="tanggal"></td>
              </tr>
              <tr>
                <th>Jenis</th>
                <td id="jenis"></td>
              </tr>
              <tr>
                <th>Nomor P</th>
                <td id="nomor_p"></td>
              </tr>
              <tr>
                <th>Nomor ID</th>
                <td id="nomor_id"></td>
              </tr>
              <tr>
                <th>Link HKI</th>
                <td>
                  <a href="" id="link_hki"></a>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data HKI</h1>
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
                <th>Judul HKI</th>
                <td>
                  <input type="text" name="judul_hki-add" id="judul_hki-add" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Tanggal</th>
                <td>
                  <input type="date" name="tanggal-add" id="tanggal-add">
                </td>
              </tr>
              <tr>
                <th>Jenis</th>
                <td>
                  <input type="text" name="jenis-add" id="jenis-add" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Nomor P</th>
                <td>
                  <input type="text" name="nomor_p-add" id="nomor_p-add" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Nomor ID</th>
                <td>
                  <input type="text" name="nomor_id-add" id="nomor_id-add" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Link HKI</th>
                <td>
                  <input type="text" name="link_hki-add" id="link_hki-add" class="form-control">
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Artikel Ilmiah</h1>
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
                <th>Judul HKI</th>
                <td>
                  <input type="text" name="judul_hki-edit" id="judul_hki-edit" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Tanggal</th>
                <td>
                  <input type="date" name="tanggal-edit" id="tanggal-edit">
                </td>
              </tr>
              <tr>
                <th>Jenis</th>
                <td>
                  <input type="text" name="jenis-edit" id="jenis-edit" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Nomor P</th>
                <td>
                  <input type="text" name="nomor_p-edit" id="nomor_p-edit" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Nomor ID</th>
                <td>
                  <input type="text" name="nomor_id-edit" id="nomor_id-edit" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Link HKI</th>
                <td>
                  <input type="text" name="link_hki-edit" id="link_hki-edit" class="form-control">
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
          let route = "{{ route('hki.destroy', ['hki' => '__ID__']) }}";
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
            let fieldJudul = document.getElementById('judul_hki-edit');
            let fieldTanggal = document.getElementById('tanggal-edit');
            let fieldJenis = document.getElementById('jenis-edit');
            let fieldNomorP = document.getElementById('nomor_p-edit');
            let fieldNomorID = document.getElementById('nomor_id-edit');
            let fieldLink = document.getElementById('link_hki-edit');

            fieldPemilik.innerHTML = `<option value="${data.dataStaff.id_staff}">${data.dataStaff.nama_lengkap} ${data.dataStaff.gelar}</option>`;
            fieldJudul.value = data.dataHKI.judul_hki;
            flatpickr('#tanggal-edit', {
              dateFormat: "Y-m-d",
              defaultDate: data.dataHKI.tanggal
            });
            fieldJenis.value = data.dataHKI.jenis;
            fieldNomorP.value = data.dataHKI.nomor_p;
            fieldNomorID.value = data.dataHKI.nomor_id;
            fieldLink.value = data.dataHKI.link_hki;
          }
        }
      };

      let route = '{{ route("hki.edit", ["hki" => "__ID__"]) }}';
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
            data.dataHKI.forEach(element => {
            tbody.innerHTML += `
              <tr>
                <td>${i + 1}</td>
                <td>${ data.dataStaff[i].nama_lengkap } ${ data.dataStaff[i].gelar }</td>
                <td>${ element.judul_hki }</td>
                <td>${ element.tanggal }</td>
                <td class="d-flex">
                  <a href="" class="btn btn-secondary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick="showModal('${ element.id_hki }')"><i class="fas fa-eye"></i></a>
                  <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editModal('${ element.id_hki }')"><i class="fas fa-edit"></i></a>
                  <a href="" class="btn btn-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModal('${ element.id_hki }')"><i class="fas fa-trash-can"></i></a>
                </td>
              </tr>
            `;
            i++;
            });
          }
        }
      };

      xhttp.open('GET', '{{ route("hki.getHKI") }}', true);
      xhttp.send();
    }

    function addModal() {
      let xhttp = new XMLHttpRequest();
      flatpickr("#tanggal-add", {
        dateFormat: "Y-m-d",
      });
      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            let fieldPemilik = document.getElementById('nama_pemilik-add');
            fieldPemilik.innerHTML = `<option value="not-selected" selected>Pilih</option>`;
            data.dataStaff.forEach(element => {
              fieldPemilik.innerHTML += `<option value="${element.id_staff}">${element.nama_lengkap}</option>`;
            });
          }
        }
      };

      xhttp.open('GET', '{{ route("hki.create") }}', true);
      xhttp.send();
    }

    function addData() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      let fieldPemilik = document.getElementById('nama_pemilik-add').value;
      let fieldJudul = document.getElementById('judul_hki-add').value;
      let fieldTanggal = document.getElementById('tanggal-add').value;
      let fieldJenis = document.getElementById('jenis-add').value;
      let fieldNomorP = document.getElementById('nomor_p-add').value;
      let fieldNomorID = document.getElementById('nomor_id-add').value;
      let fieldLink = document.getElementById('link_hki-add').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('nama_pemilik', fieldPemilik);
      formData.append('judul_hki', fieldJudul);
      formData.append('tanggal', fieldTanggal);
      formData.append('jenis', fieldJenis);
      formData.append('nomor_p', fieldNomorP);
      formData.append('nomor_id', fieldNomorID);
      formData.append('link_hki', fieldLink);
      formData.append('_token', token);

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          console.log(data);
          console.log(token);
          if(data.status == 'success') {
            Swal.fire('Berhasil', 'Tambah data berhasil!', 'success');
            getData();
          } else {
            Swal.fire('Kesalahan', 'Terjadi error, coba lagi nanti!', 'error');
          }
        }
      };

      xhttp.open('POST', '{{ route("hki.store") }}', true);
      xhttp.send(formData);
    }

    function editData() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      let fieldPemilik = document.getElementById('nama_pemilik-edit').value;
      let fieldJudul = document.getElementById('judul_hki-edit').value;
      let fieldTanggal = document.getElementById('tanggal-edit').value;
      let fieldJenis = document.getElementById('jenis-edit').value;
      let fieldNomorP = document.getElementById('nomor_p-edit').value;
      let fieldNomorID = document.getElementById('nomor_id-edit').value;
      let fieldLink = document.getElementById('link_hki-edit').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('nama_pemilik', fieldPemilik);
      formData.append('judul_hki', fieldJudul);
      formData.append('tanggal', fieldTanggal);
      formData.append('jenis', fieldJenis);
      formData.append('nomor_p', fieldNomorP);
      formData.append('nomor_id', fieldNomorID);
      formData.append('link_hki', fieldLink);
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

      let route = '{{ route("hki.update", ["hki" => "__ID__"]) }}';
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
            let fieldJudul = document.getElementById('judul_hki');
            let fieldTanggal = document.getElementById('tanggal');
            let fieldJenis = document.getElementById('jenis');
            let fieldNomorP = document.getElementById('nomor_p');
            let fieldNomorID = document.getElementById('nomor_id');
            let fieldLink = document.getElementById('link_hki');

            fieldPemilik.innerText = data.dataStaff.nama_lengkap + " " + data.dataStaff.gelar;
            fieldJudul.innerText = data.dataHKI.judul_hki;
            fieldTanggal.innerText = data.dataHKI.tanggal;
            fieldJenis.innerText = data.dataHKI.jenis;
            fieldNomorP.innerText = data.dataHKI.nomor_p;
            fieldNomorID.innerText = data.dataHKI.nomor_id;
            fieldLink.innerText = data.dataHKI.link_hki;
            fieldLink.setAttribute('href', data.dataHKI.link_hki);
          } else {
            Swal.fire('Kesalahan', 'Terjadi error, coba lagi nanti!', 'error');
          }
        }
      };

      let route = '{{ route("hki.show", ["hki" => "__ID__"]) }}';
      xhttp.open('GET', route.replace('__ID__', id), true);
      xhttp.send();
    }
  </script>
@endsection