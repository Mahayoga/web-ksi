@extends('layouts.admin.app')
@section('content')
  @csrf
  <h1 class="mt-4">Data Karya Buku</h1>
  <hr>
  <a href="" onclick="addModal()" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary"><i class="fas fa-add me-2"></i>Tambah Data</a>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pemilik</th>
            <th>Judul Buku</th>
            <th>Penerbit</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
          @php $i = 0; @endphp
          @foreach ($dataBuku as $item)
            <tr>
              <td>{{ $i + 1 }}</td>
              <td>{{ $dataStaff[$i]->gelar_depan }} {{ $dataStaff[$i]->nama_lengkap }} {{ $dataStaff[$i]->gelar_belakang }}</td>
              <td>{{ $item->judul_buku }}</td>
              <td>{{ $item->penerbit }}</td>
              <td class="d-flex">
                <a href="" class="btn btn-secondary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick="showModal('{{ $item->id_buku }}')"><i class="fas fa-eye"></i></a>
                <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editModal('{{ $item->id_buku }}')"><i class="fas fa-edit"></i></a>
                <a href="" class="btn btn-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModal('{{ $item->id_buku }}')"><i class="fas fa-trash-can"></i></a>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Karya Buku</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              {{-- id_buku
                judul_buku
                tahun
                jumlah_halaman
                penerbit
                isbn
                id_staff --}}
              <tr>
                <th>Nama Pemilik</th>
                <td id="nama_pemilik"></td>
              </tr>
              <tr>
                <th>Judul Buku</th>
                <td id="judul_buku"></td>
              </tr>
              <tr>
                <th>Tahun</th>
                <td id="tahun"></td>
              </tr>
              <tr>
                <th>Jumlah Halaman</th>
                <td id="jumlah_halaman"></td>
              </tr>
              <tr>
                <th>Penerbit</th>
                <td id="penerbit"></td>
              </tr>
              <tr>
                <th>ISBN</th>
                <td id="isbn"></td>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Karya Buku</h1>
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
                <th>Judul Buku</th>
                <td>
                  <input type="text" name="judul_buku-add" id="judul_buku-add" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Tahun</th>
                <td>
                  <select name="tahun-add" id="tahun-add" class="form-select"></select>
                </td>
              </tr>
              <tr>
                <th>Jumlah Halaman</th>
                <td>
                  <input type="number" name="jumlah_halaman-add" id="jumlah_halaman-add" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Penerbit</th>
                <td>
                  <input type="text" name="penerbit-add" id="penerbit-add" class="form-control">
                </td>
              </tr>
              <tr>
                <th>ISBN</th>
                <td id="isbn">
                  <input type="text" name="isbn-add" id="isbn-add" class="form-control">
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Karya Buku</h1>
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
                <th>Judul Buku</th>
                <td>
                  <input type="text" name="judul_buku-edit" id="judul_buku-edit" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Tahun</th>
                <td>
                  <select name="tahun-edit" id="tahun-edit" class="form-select"></select>
                </td>
              </tr>
              <tr>
                <th>Jumlah Halaman</th>
                <td>
                  <input type="number" name="jumlah_halaman-edit" id="jumlah_halaman-edit" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Penerbit</th>
                <td>
                  <input type="text" name="penerbit-edit" id="penerbit-edit" class="form-control">
                </td>
              </tr>
              <tr>
                <th>ISBN</th>
                <td id="isbn">
                  <input type="text" name="isbn-edit" id="isbn-edit" class="form-control">
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
          let route = "{{ route('karyabuku.destroy', ['karyabuku' => '__ID__']) }}";
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
            let fieldJudul = document.getElementById('judul_buku-edit');
            let fieldTahun = document.getElementById('tahun-edit');
            let fieldJumlahHal = document.getElementById('jumlah_halaman-edit');
            let fieldPenerbit = document.getElementById('penerbit-edit');
            let fieldISBN = document.getElementById('isbn-edit');

            fieldPemilik.innerHTML = `<option value="${data.dataStaff.id_staff}">${ setGelarInName(data.dataStaff.gelar_depan, data.dataStaff.nama_lengkap, data.dataStaff.gelar_belakang) }</option>`;
            fieldJudul.value = data.dataBuku.judul_buku;

            let date = new Date();
            fieldTahun.innerHTML = `<option value="not-selected">Pilih</option>`;
            for(var i = parseInt(date.getFullYear()); i >= 1980; i--) {
              if(i == parseInt(data.dataBuku.tahun)) {
                fieldTahun.innerHTML += `
                  <option value="${i}" selected>${i}</option>
                `;
              } else {
                fieldTahun.innerHTML += `
                  <option value="${i}">${i}</option>
                `;
              }
            }
            fieldJumlahHal.value = data.dataBuku.jumlah_halaman;
            fieldPenerbit.value = data.dataBuku.penerbit;
            fieldISBN.value = data.dataBuku.isbn;
          }
        }
      };

      let route = '{{ route("karyabuku.edit", ["karyabuku" => "__ID__"]) }}';
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
            data.dataBuku.forEach(element => {
            tbody.innerHTML += `
              <tr>
                <td>${ i + 1 }</td>
                <td>${ setGelarInName(data.dataStaff[i].gelar_depan, data.dataStaff[i].nama_lengkap, data.dataStaff[i].gelar_belakang) }</td>
                <td>${ element.judul_buku }</td>
                <td>${ element.penerbit }</td>
                <td class="d-flex">
                  <a href="" class="btn btn-secondary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick="showModal('${ element.id_buku }')"><i class="fas fa-eye"></i></a>
                  <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editModal('${ element.id_buku }')"><i class="fas fa-edit"></i></a>
                  <a href="" class="btn btn-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModal('${ element.id_buku }')"><i class="fas fa-trash-can"></i></a>
                </td>
              </tr>
            `;
            i++;
            });
          }
        }
      };

      xhttp.open('GET', '{{ route("karyabuku.getKaryaBuku") }}', true);
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
              fieldPemilik.innerHTML += `<option value="${element.id_staff}">${ setGelarInName(element.gelar_depan, element.nama_lengkap, element.gelar_belakang) }</option>`;
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

      xhttp.open('GET', '{{ route("karyabuku.create") }}', true);
      xhttp.send();
    }

    function addData() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      let fieldPemilik = document.getElementById('nama_pemilik-add').value;
      let fieldJudul = document.getElementById('judul_buku-add').value;
      let fieldTahun = document.getElementById('tahun-add').value;
      let fieldJumlahHal = document.getElementById('jumlah_halaman-add').value;
      let fieldPenerbit = document.getElementById('penerbit-add').value;
      let fieldISBN = document.getElementById('isbn-add').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('nama_pemilik', fieldPemilik);
      formData.append('judul_buku', fieldJudul);
      formData.append('tahun', fieldTahun);
      formData.append('jumlah_halaman', fieldJumlahHal);
      formData.append('penerbit', fieldPenerbit);
      formData.append('isbn', fieldISBN);
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

      xhttp.open('POST', '{{ route("karyabuku.store") }}', true);
      xhttp.send(formData);
    }

    function editData() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      let fieldPemilik = document.getElementById('nama_pemilik-edit').value;
      let fieldJudul = document.getElementById('judul_buku-edit').value;
      let fieldTahun = document.getElementById('tahun-edit').value;
      let fieldJumlahHal = document.getElementById('jumlah_halaman-edit').value;
      let fieldPenerbit = document.getElementById('penerbit-edit').value;
      let fieldISBN = document.getElementById('isbn-edit').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('nama_pemilik', fieldPemilik);
      formData.append('judul_buku', fieldJudul);
      formData.append('tahun', fieldTahun);
      formData.append('jumlah_halaman', fieldJumlahHal);
      formData.append('penerbit', fieldPenerbit);
      formData.append('isbn', fieldISBN);
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

      let route = '{{ route("karyabuku.update", ["karyabuku" => "__ID__"]) }}';
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
            let fieldJudul = document.getElementById('judul_buku');
            let fieldTahun = document.getElementById('tahun');
            let fieldJumlahHal = document.getElementById('jumlah_halaman');
            let fieldPenerbit = document.getElementById('penerbit');
            let fieldISBN = document.getElementById('isbn');

            fieldPemilik.innerText = setGelarInName(data.dataStaff.gelar_depan, data.dataStaff.nama_lengkap, data.dataStaff.gelar_belakang);
            fieldJudul.innerText = data.dataBuku.judul_buku;
            fieldTahun.innerText = data.dataBuku.tahun;
            fieldJumlahHal.innerText = data.dataBuku.jumlah_halaman;
            fieldPenerbit.innerText = data.dataBuku.penerbit;
            fieldISBN.innerText = data.dataBuku.isbn;
          } else {
            Swal.fire('Kesalahan', 'Terjadi error, coba lagi nanti!', 'error');
          }
        }
      };

      let route = '{{ route("karyabuku.show", ["karyabuku" => "__ID__"]) }}';
      xhttp.open('GET', route.replace('__ID__', id), true);
      xhttp.send();
    }
  </script>
@endsection