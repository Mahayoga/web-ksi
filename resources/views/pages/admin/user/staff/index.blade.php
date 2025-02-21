@extends('layouts.admin.app')
@section('content')
  @csrf
  <h1 class="mt-4">Data Staff</h1>
  <hr>
  <a href="" onclick="addModal()" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary"><i class="fas fa-add me-2"></i>Tambah Data</a>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
        <thead>
          <tr>
            {{-- id_staff
            id_staff
            nama_lengkap
            gelar_depan
            gelar_belakang
            jenis_kelamin
            id_pangkat
            NIP
            NIDN
            tempat_lahir
            tanggal_lahir
            nomor_telepon
            fax
            alamat
            deskripsi
            profile_image --}}
            <th>No</th>
            <th>Nama Pemilik</th>
            <th>NIP</th>
            <th>NIDN</th>
            <th>Jabatan Fungsional</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
          @php $i = 0; @endphp
          @foreach ($dataStaff as $item)
            <tr>
              <td>{{ $i + 1 }}</td>
              <td><span class="show-gelar_depan">{{ $item->gelar_depan }}</span>{{ $item->nama_lengkap }}<span class="show-gelar_belakang">{{ $item->gelar_belakang }}</span></td>
              @if ($item->NIP == null)
                <td><i>(Belum diatur)</i></td>
              @else
                <td>{{ $item->NIP }}</td>
              @endif
              @if ($item->NIDN == null)
                <td><i>(Belum diatur)</i></td>
              @else
                <td>{{ $item->NIDN }}</td>
              @endif
              @if ($item->pangkat == null)
                <td><i>(Belum diatur)</i></td>
              @else
                <td>{{ $item->pangkat->jabatan->nama_jabatan }} - {{ $item->pangkat->nama_pangkat }} ({{ $item->pangkat->golongan }})</td>
              @endif
              <td class="d-flex">
                <a href="" class="btn btn-secondary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick="showModal('{{ $item->id_staff }}')"><i class="fas fa-eye"></i></a>
                <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editModal('{{ $item->id_staff }}')"><i class="fas fa-edit"></i></a>
                <a href="" class="btn btn-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModal('{{ $item->id_staff }}')"><i class="fas fa-trash-can"></i></a>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Staff</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              {{-- id_staff
                nama_lengkap
                gelar_depan
                gelar_belakang
                jenis_kelamin
                id_pangkat
                NIP
                NIDN
                tempat_lahir
                tanggal_lahir
                nomor_telepon
                fax
                alamat
                deskripsi
                profile_image --}}
              <tr>
                <th>Nama Lengkap</th>
                <td id="nama_lengkap"></td>
              </tr>
              <tr>
                <th>Gelar Depan</th>
                <td id="gelar_depan"></td>
              </tr>
              <tr>
                <th>Gelar Belakang</th>
                <td id="gelar_belakang"></td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td id="jenis_kelamin"></td>
              </tr>
              <tr>
                <th>Jabatan Fungsional</th>
                <td id="jabatan_fungsional"></td>
              </tr>
              <tr>
                <th>NIP</th>
                <td id="NIP"></td>
              </tr>
              <tr>
                <th>NIDN</th>
                <td id="NIDN"></td>
              </tr>
              <tr>
                <th>Tempat Lahir</th>
                <td id="tempat_lahir"></td>
              </tr>
              <tr>
                <th>Tanggal Lahir</th>
                <td id="tanggal_lahir"></td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td id="alamat"></td>
              </tr>
              <tr>
                <th>Deskripsi</th>
                <td id="deskripsi"></td>
              </tr>
              <tr>
                <th>Email</th>
                <td id="email"></td>
              </tr>
              <tr>
                <th>Nomor Telepon</th>
                <td id="nomor_telepon"></td>
              </tr>
              <tr>
                <th>Fax</th>
                <td id="fax"></td>
              </tr>
              <tr>
                <th>Kantor</th>
                <td id="nama_kantor"></td>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Staff</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- id_staff
            nama_lengkap
            gelar_depan
            gelar_belakang
            jenis_kelamin
            id_pangkat
            NIP
            NIDN
            tempat_lahir
            tanggal_lahir
            nomor_telepon
            fax
            alamat
            deskripsi
            profile_image --}}
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>Nama Lengkap</th>
                <td>
                  <input type="text" name="nama_lengkap-add" id="nama_lengkap-add" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td id="jenis_kelamin">
                  <select name="jenis_kelamin-add" id="jenis_kelamin-add" class="form-select">
                    <option value="not-selected">Pilih</option>
                    <option value="l">Laki-Laki</option>
                    <option value="p">Perempuan</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th>Kantor</th>
                <td>
                  <select name="nama_kantor-add" id="nama_kantor-add" class="form-select"></select>
                </td>
              </tr>
              <tr>
                <th>Email</th>
                <td>
                  <input type="email" name="email-add" id="email-add" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Password</th>
                <td>
                  <input type="text" name="password-add" id="password-add" class="form-control">
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Staff</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>Nama Lengkap</th>
                <td>
                  <input disabled type="text" name="nama_lengkap-edit" id="nama_lengkap-edit" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td id="jenis_kelamin">
                  <select name="jenis_kelamin-edit" id="jenis_kelamin-edit" class="form-select">
                    <option value="not-selected">Pilih</option>
                    <option value="l">Laki-Laki</option>
                    <option value="p">Perempuan</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th>Kantor</th>
                <td>
                  <select name="nama_kantor-edit" id="nama_kantor-edit" class="form-select"></select>
                </td>
              </tr>
              <tr>
                <th>Email</th>
                <td>
                  <input type="email" name="email-edit" id="email-edit" class="form-control">
                </td>
              </tr>
              <tr>
                <th>Password</th>
                <td>
                  <input type="text" name="password-edit" id="password-edit" placeholder="Jangan isikan password jika tidak mau diubah" class="form-control">
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
    function setGelarInName() {
      let gelarDepan = document.getElementsByClassName('show-gelar_depan');
      let gelarBelakang = document.getElementsByClassName('show-gelar_belakang');

      for(var i = 0; i < gelarDepan.length; i++) {
        if(gelarDepan[i].innerText != '' || gelarDepan[i].innerText != '-' || gelarDepan[i].innerText != null) {
          gelarDepan[i].innerText = gelarDepan[i].innerText + ' ';
        }
      }
      for(var i = 0; i < gelarBelakang.length; i++) {
        if(gelarBelakang[i].innerText != '' || gelarBelakang[i].innerText != '-' || gelarBelakang[i].innerText != null) {
          gelarBelakang[i].innerText = ' ' + gelarBelakang[i].innerText ;
        }
      }
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
                Swal.fire("Error", "Data ini sedang digunakan oleh data lainnya!", "error");
              }
            }
          };

          let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
          let route = "{{ route('staff.destroy', ['staff' => '__ID__']) }}";
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
            let fieldPemilik = document.getElementById('nama_lengkap-edit');
            let fieldKelamin = document.getElementById('jenis_kelamin-edit');
            let fieldKantor = document.getElementById('nama_kantor-edit');
            let fieldEmail = document.getElementById('email-edit');
            let fieldPassword = document.getElementById('password-edit');

            fieldPemilik.value = data.dataStaff.nama_lengkap;

            if(data.dataStaff.jenis_kelamin == 'l') {
              fieldKelamin.innerHTML = `
                <option value="not-selected">Pilih</option>
                <option value="l" selected>Laki-Laki</option>
                <option value="p">Perempuan</option>
              `;
            } else {
              fieldKelamin.innerHTML = `
                <option value="not-selected">Pilih</option>
                <option value="l">Laki-Laki</option>
                <option value="p" selected>Perempuan</option>
              `;
            }

            fieldKantor.innerHTML = `<option value="not-selected">Pilih</option>`;
            data.dataKantor.forEach(element => {
              if(data.dataStaff.id_kantor == element.id_kantor) {
                fieldKantor.innerHTML += `<option value="${element.id_kantor}" selected>${element.nama_kantor}</option>`;
              } else {
                fieldKantor.innerHTML += `<option value="${element.id_kantor}">${element.nama_kantor}</option>`;
              }
            });

            fieldEmail.value = data.dataUser.email;
          }
        }
      };

      let route = '{{ route("staff.edit", ["staff" => "__ID__"]) }}';
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
            data.dataStaff.forEach(element => {
              let newNIP = '<i>(Belum diatur)</i>';
              let newNIDN = '<i>(Belum diatur)</i>';
              let newPangkat = '<i>(Belum diatur)</i>';
              if(element.NIP != null || element.NIP != undefined) {
                newNIP = element.NIP;
              }
              if(element.NIDN != null || element.NIDN != undefined) {
                newNIDN = element.NIDN;
              }
              if(element.id_pangkat != null || element.id_pangkat != undefined) {
                newPangkat = `${ data.dataJabatan[i].nama_jabatan } - ${ data.dataPangkat[i].nama_pangkat } (${ data.dataPangkat[i].golongan })`;
              }
              tbody.innerHTML += `
                <tr>
                  <td>${ i + 1 }</td>
                  <td>${ element.nama_lengkap }</td>
                  <td>${ newNIP }</td>
                  <td>${ newNIDN }</td>
                  <td>${ newPangkat }</td>
                  <td class="d-flex">
                    <a href="" class="btn btn-secondary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick="showModal('${ element.id_staff }')"><i class="fas fa-eye"></i></a>
                    <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editModal('${ element.id_staff }')"><i class="fas fa-edit"></i></a>
                    <a href="" class="btn btn-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModal('${ element.id_staff }')"><i class="fas fa-trash-can"></i></a>
                  </td>
                </tr>
              `;
              i++;
            });
          }
        }
      };

      xhttp.open('GET', '{{ route("staff.getStaff") }}', true);
      xhttp.send();
    }

    function addModal() {
      let xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            let fieldKantor = document.getElementById('nama_kantor-add');
            fieldKantor.innerHTML = `<option value="not-selected" selected>Pilih</option>`;
            data.dataKantor.forEach(element => {
              fieldKantor.innerHTML += `<option value="${element.id_kantor}">${element.nama_kantor}</option>`;
            });
          }
        }
      };

      xhttp.open('GET', '{{ route("staff.create") }}', true);
      xhttp.send();
    }

    function addData() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      let fieldPemilik = document.getElementById('nama_lengkap-add').value;
      let fieldKelamin = document.getElementById('jenis_kelamin-add').value;
      let fieldKantor = document.getElementById('nama_kantor-add').value;
      let fieldEmail = document.getElementById('email-add').value;
      let fieldPassword = document.getElementById('password-add').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('nama_lengkap', fieldPemilik);
      formData.append('jenis_kelamin', fieldKelamin);
      formData.append('nama_kantor', fieldKantor);
      formData.append('email', fieldEmail);
      formData.append('password', fieldPassword);
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

      xhttp.open('POST', '{{ route("staff.store") }}', true);
      xhttp.send(formData);
    }

    function editData() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      let fieldPemilik = document.getElementById('nama_lengkap-edit').value;
      let fieldKelamin = document.getElementById('jenis_kelamin-edit').value;
      let fieldKantor = document.getElementById('nama_kantor-edit').value;
      let fieldEmail = document.getElementById('email-edit').value;
      let fieldPassword = document.getElementById('password-edit').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('nama_lengkap', fieldPemilik);
      formData.append('jenis_kelamin', fieldKelamin);
      formData.append('nama_kantor', fieldKantor);
      formData.append('email', fieldEmail);
      formData.append('password', fieldPassword);
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

      let route = '{{ route("staff.update", ["staff" => "__ID__"]) }}';
      xhttp.open('POST', route.replace('__ID__', idEdit));
      xhttp.send(formData);
    }

    function showModal(id) {
      let xhttp = new XMLHttpRequest();
      
      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            let fieldPemilik = document.getElementById('nama_lengkap');
            let fieldGelarDepan = document.getElementById('gelar_depan');
            let fieldGelarBelakang = document.getElementById('gelar_belakang');
            let fieldKelamin = document.getElementById('jenis_kelamin');
            let fieldJabatan = document.getElementById('jabatan_fungsional');
            let fieldNIP = document.getElementById('NIP');
            let fieldNIDN = document.getElementById('NIDN');
            let fieldTempatLahir = document.getElementById('tempat_lahir');
            let fieldTanggalLahir = document.getElementById('tanggal_lahir');
            let fieldEmail = document.getElementById('email');
            let fieldNoTelp = document.getElementById('nomor_telepon');
            let fieldFax = document.getElementById('fax');
            let fieldKantor = document.getElementById('nama_kantor');
            let fieldAlamat = document.getElementById('alamat');
            let fieldDeskripsi = document.getElementById('deskripsi');

            fieldPemilik.innerText = data.dataStaff.nama_lengkap;
            if(data.dataStaff.gelar_depan == "" || data.dataStaff.gelar_depan == "-" || data.dataStaff.gelar_depan == null) {
              fieldGelarDepan.innerText = "-";
            } else {
              fieldGelarDepan.innerText = data.dataStaff.gelar_depan;
            }
            if(data.dataStaff.gelar_belakang == "" || data.dataStaff.gelar_belakang == "-" || data.dataStaff.gelar_belakang == null) {
              fieldGelarBelakang.innerText = "-";
            } else {
              fieldGelarBelakang.innerText = data.dataStaff.gelar_belakang;
            }
            if(data.dataStaff.jenis_kelamin == 'l') {
              fieldKelamin.innerText = 'Laki-Laki';
            } else {
              fieldKelamin.innerText = 'Perempuan';
            }
            fieldJabatan.innerText = data.dataJabatan.nama_jabatan + " - " + data.dataPangkat.nama_pangkat + " (" + data.dataPangkat.golongan + ")";
            fieldNIP.innerText = data.dataStaff.NIP;
            fieldNIDN.innerText = data.dataStaff.NIDN;
            fieldTempatLahir.innerText = data.dataStaff.tempat_lahir;
            fieldTanggalLahir.innerText = data.dataStaff.tanggal_lahir;
            fieldEmail.innerText = data.dataUser.email;
            fieldNoTelp.innerText = data.dataStaff.nomor_telepon;
            fieldFax.innerText = data.dataStaff.fax;
            fieldKantor.innerText = data.dataKantor.nama_kantor;
            fieldAlamat.innerText = data.dataStaff.alamat;
            fieldDeskripsi.innerText = data.dataStaff.deskripsi;
          } else {
            Swal.fire('Kesalahan', 'Terjadi error, coba lagi nanti!', 'error');
          }
        }
      };

      let route = '{{ route("staff.show", ["staff" => "__ID__"]) }}';
      xhttp.open('GET', route.replace('__ID__', id), true);
      xhttp.send();
    }
  
    setGelarInName();
  </script>
@endsection