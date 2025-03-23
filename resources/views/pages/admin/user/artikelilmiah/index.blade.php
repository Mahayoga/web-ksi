@extends('layouts.admin.app')
@section('content')
  @csrf
  <h1 class="mt-4">Data Artikel Ilmiah</h1>
  <hr>
  <a href="" onclick="addModal()" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary"><i class="fas fa-add me-2"></i>Tambah Data</a>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pemilik</th>
            <th>Judul Artikel</th>
            <th>Tahun</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
          @php $i = 1; @endphp
          @foreach ($dataArtikel as $item)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $dataStaff[$i - 1]->gelar_depan }} {{ $dataStaff[$i - 1]->nama_lengkap }} {{ $dataStaff[$i - 1]->gelar_belakang }}</td>
              <td>{{ $item->judul_artikel }}</td>
              <td>{{ $item->tahun }}</td>
              <td class="d-flex">
                <a href="" class="btn btn-secondary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick="showModal('{{ $item->id_artikel }}')"><i class="fas fa-eye"></i></a>
                <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editModal('{{ $item->id_artikel }}')"><i class="fas fa-edit"></i></a>
                <a href="" class="btn btn-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModal('{{ $item->id_artikel }}')"><i class="fas fa-trash-can"></i></a>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Artikel Ilmiah</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>Nama Pemilik</th>
                <td id="nama_pemilik"></td>
              </tr>
              <tr>
                <th>Judul Artikel</th>
                <td id="judul_artikel"></td>
              </tr>
              <tr>
                <th>Nama Jurnal</th>
                <td id="nama_jurnal"></td>
              </tr>
              <tr>
                <th>Tahun</th>
                <td id="tahun_artikel"></td>
              </tr>
              <tr>
                <th>Volume / Nomor</th>
                <td id="volume_nomor"></td>
              </tr>
              <tr>
                <th>Link Artikel</th>
                <td>
                  <a href="" id="link_artikel"></a>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Artikel Ilmiah</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>Nama Pemilik</th>
                <td>
                  <select class="form-select" name="nama_pemilik-add" id="nama_pemilik-add"></select>
                </td>
              </tr>
              <tr>
                <th>Judul Artikel</th>
                <td>
                  <input class="form-control" type="text" name="judul_artikel-add" id="judul_artikel-add">
                </td>
              </tr>
              <tr>
                <th>Nama Jurnal</th>
                <td>
                  <input class="form-control" type="text" name="nama_jurnal-add" id="nama_jurnal-add">
                </td>
              </tr>
              <tr>
                <th>Tahun</th>
                <td>
                  <select class="form-select" name="tahun_artikel-add" id="tahun_artikel-add"></select>
                </td>
              </tr>
              <tr>
                <th>Volume / Nomor</th>
                <td>
                  <input class="form-control" type="text" name="volume_nomor" id="volume_nomor-add">
                </td>
              </tr>
              <tr>
                <th>Link Artikel</th>
                <td>
                  <input class="form-control" type="text" name="link_artikel-add" id="link_artikel-add">
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
                  <select disabled class="form-select" name="nama_pemilik-edit" id="nama_pemilik-edit"></select>
                </td>
              </tr>
              <tr>
                <th>Judul Artikel</th>
                <td>
                  <input class="form-control" type="text" name="judul_artikel-edit" id="judul_artikel-edit">
                </td>
              </tr>
              <tr>
                <th>Nama Jurnal</th>
                <td>
                  <input class="form-control" type="text" name="nama_jurnal-edit" id="nama_jurnal-edit">
                </td>
              </tr>
              <tr>
                <th>Tahun</th>
                <td>
                  <select class="form-select" name="tahun_artikel-edit" id="tahun_artikel-edit"></select>
                </td>
              </tr>
              <tr>
                <th>Volume / Nomor</th>
                <td>
                  <input class="form-control" type="text" name="volume_nomor" id="volume_nomor-edit">
                </td>
              </tr>
              <tr>
                <th>Link Artikel</th>
                <td>
                  <input class="form-control" type="text" name="link_artikel-edit" id="link_artikel-edit">
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
        denyButtonText: `Hapus`,
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
                Swal.fire("Error", "Terjadi error saat menghapus data!\n" + data.msg, "error");
              }
            }
          };

          let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
          let route = "{{ route('artikelilmiah.destroy', ['artikelilmiah' => '__ID__']) }}";
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
            let fieldJudul = document.getElementById('judul_artikel-edit');
            let fieldNamaJurnal = document.getElementById('nama_jurnal-edit');
            let fieldTahun = document.getElementById('tahun_artikel-edit');
            let fieldVolume = document.getElementById('volume_nomor-edit');
            let fieldLink = document.getElementById('link_artikel-edit');

            fieldPemilik.innerHTML = `<option value="${data.dataStaffEdit.id_staff}" selected>${ setGelarInName(data.dataStaffEdit.gelar_depan, data.dataStaffEdit.nama_lengkap, data.dataStaffEdit.gelar_belakang) }</option>`;
            fieldJudul.value = data.dataArtikelEdit.judul_artikel;
            fieldNamaJurnal.value = data.dataArtikelEdit.nama_jurnal;
            fieldVolume.value = data.dataArtikelEdit.volume_nomor;
            fieldLink.value = data.dataArtikelEdit.link_artikel;

            let tahunArtikel= document.getElementById('tahun_artikel-edit');
            let date = new Date();
            tahunArtikel.innerHTML = `<option value="not-selected" selected>Pilih</option>`;
            for(var i = parseInt(date.getFullYear()) - 2; i >= 1980; i--) {
              if(i == parseInt(data.dataArtikelEdit.tahun)) {
                tahunArtikel.innerHTML += `
                  <option value="${i}" selected>${i}</option>
                `;
              } else {
                tahunArtikel.innerHTML += `
                  <option value="${i}">${i}</option>
                `;
              }
            }
          }
        }
      };

      let route = '{{ route("artikelilmiah.edit", ["artikelilmiah" => "__ID__"]) }}';
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
            data.dataArtikel.forEach(element => {
            tbody.innerHTML += `
              <tr>
                <td>${i + 1}</td>
                <td>${ setGelarInName(data.dataStaff[i].gelar_depan, data.dataStaff[i].nama_lengkap, data.dataStaff[i].gelar_belakang) }</td>
                <td>${element.judul_artikel }</td>
                <td>${element.tahun }</td>
                <td class="d-flex">
                  <a href="" class="btn btn-secondary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick="showModal('${ element.id_artikel }')"><i class="fas fa-eye"></i></a>
                  <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editModal('${ element.id_artikel }')"><i class="fas fa-edit"></i></a>
                  <a href="" class="btn btn-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModal('${ element.id_artikel }')"><i class="fas fa-trash-can"></i></a>
                </td>
              </tr>
            `;
            i++;
            });
          }
        }
      };

      xhttp.open('GET', '{{ route("artikelilmiah.getArtikelIlmiah") }}', true);
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
            let tahunArtikel= document.getElementById('tahun_artikel-add');
            let date = new Date();
            tahunArtikel.innerHTML = `<option value="not-selected" selected>Pilih</option>`;
            for(var i = parseInt(date.getFullYear()) - 2; i >= 1980; i--) {
              tahunArtikel.innerHTML += `
                <option value="${i}">${i}</option>
              `;
            }
          }
        }
      };

      xhttp.open('GET', '{{ route("artikelilmiah.create") }}', true);
      xhttp.send();
    }

    function addData() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      let fieldPemilik = document.getElementById('nama_pemilik-add').value;
      let fieldJudul = document.getElementById('judul_artikel-add').value;
      let fieldNamaJurnal = document.getElementById('nama_jurnal-add').value;
      let fieldTahun = document.getElementById('tahun_artikel-add').value;
      let fieldVolume = document.getElementById('volume_nomor-add').value;
      let fieldLink = document.getElementById('link_artikel-add').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('nama_pemilik', fieldPemilik);
      formData.append('judul_artikel', fieldJudul);
      formData.append('nama_jurnal', fieldNamaJurnal);
      formData.append('tahun_artikel', fieldTahun);
      formData.append('volume_nomor', fieldVolume);
      formData.append('link_artikel', fieldLink);
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

      xhttp.open('POST', '{{ route("artikelilmiah.store") }}', true);
      // xhttp.setRequestHeader('X-CSRF-TOKEN', token);
      xhttp.send(formData);
    }

    function editData() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      let fieldPemilik = document.getElementById('nama_pemilik-edit').value;
      let fieldJudul = document.getElementById('judul_artikel-edit').value;
      let fieldNamaJurnal = document.getElementById('nama_jurnal-edit').value;
      let fieldTahun = document.getElementById('tahun_artikel-edit').value;
      let fieldVolume = document.getElementById('volume_nomor-edit').value;
      let fieldLink = document.getElementById('link_artikel-edit').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('nama_pemilik', fieldPemilik);
      formData.append('judul_artikel', fieldJudul);
      formData.append('nama_jurnal', fieldNamaJurnal);
      formData.append('tahun_artikel', fieldTahun);
      formData.append('volume_nomor', fieldVolume);
      formData.append('link_artikel', fieldLink);
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

      let route = '{{ route("artikelilmiah.update", ["artikelilmiah" => "__ID__"]) }}';
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
            let fieldJudul = document.getElementById('judul_artikel');
            let fieldNamaJurnal = document.getElementById('nama_jurnal');
            let fieldTahun = document.getElementById('tahun_artikel');
            let fieldVolume = document.getElementById('volume_nomor');
            let fieldLink = document.getElementById('link_artikel');

            fieldPemilik.innerText = setGelarInName(data.dataStaff.gelar_depan, data.dataStaff.nama_lengkap, data.dataStaff.gelar_belakang);
            fieldJudul.innerText = data.dataArtikel.judul_artikel;
            fieldNamaJurnal.innerText = data.dataArtikel.nama_jurnal;
            fieldTahun.innerText = data.dataArtikel.tahun;
            fieldVolume.innerText = data.dataArtikel.volume_nomor;
            fieldLink.innerText = data.dataArtikel.link_artikel;
            fieldLink.setAttribute('href', data.dataArtikel.link_artikel);
          } else {
            Swal.fire('Kesalahan', 'Terjadi error, coba lagi nanti!', 'error');
          }
        }
      };

      let route = '{{ route("artikelilmiah.show", ["artikelilmiah" => "__ID__"]) }}';
      xhttp.open('GET', route.replace('__ID__', id), true);
      xhttp.send();
    }
  </script>
@endsection