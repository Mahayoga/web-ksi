@extends('layouts.admin.app')
@section('content')
  <div class="row my-4">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body d-flex justify-content-center">
          <img src="{{ asset('storage/' . $dataStaff->profile_image) }}" id="profile_img" class="card-img-top rounded-circle" style="max-width: 50%">
        </div>
        <div class="card-body">
          <div class="fs-3 text-center" id="nama_lengkap_dan_gelar"></div>
          <div class="fs-6 text-secondary text-center">{{ $dataKantor->nama_kantor }}</div>
          <div class="fs-6 text-secondary text-center">{{ $dataKampus->nama_kampus }}</div>
        </div>
        <div class="card-body">
          <input type="file" name="img_file" id="img_file" class="d-none my-2">
          <div class="d-none" id="alert-img">Klik batal untuk membatalkan</div>
          <button type="button" onclick="setEditProfilField()" id="img-add-btn" class="btn btn-secondary">Edit foto profil</button>
          <button type="button" onclick="setDefaultProfile()" id="img-edit-default-btn" class="btn btn-secondary d-none">Hapus foto profil</button>
          <button type="button" onclick="setCancelEditProfilField()" id="img-add-cancel-btn" class="btn btn-secondary d-none">Batal</button>
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
                <td class="text-secondary" id="edit-nama_lengkap">{{ $dataStaff->nama_lengkap }}</td>
              </tr>
              <tr>
                <th>Gelar (depan nama)</th>
                @if ($dataStaff->gelar_depan != '')
                  <td class="text-secondary" id="edit-gelar_depan">{{ $dataStaff->gelar_depan }}</td>
                @else
                  <td class="text-secondary" id="edit-gelar_depan">-</td>
                @endif
              </tr>
              <tr>
                <th>Gelar (belakang nama)</th>
                <td class="text-secondary" id="edit-gelar_belakang">{{ $dataStaff->gelar_belakang }}</td>
              </tr>
              <tr>
                <th>NIP</th>
                <td class="text-secondary" id="edit-nip">{{ $dataStaff->NIP }}</td>
              </tr>
              <tr>
                <th>NIDN</th>
                <td class="text-secondary" id="edit-nidn">{{ $dataStaff->NIDN }}</td>
              </tr>
              <tr>
                <th>Jabatan</th>
                <td class="text-secondary" id="edit-jabatan_fungsional">{{ $dataStaff->pangkat->jabatan->nama_jabatan }}</td>
              </tr>
              <tr>
                <th>Golongan</th>
                <td class="text-secondary" id="edit-golongan">{{ $dataStaff->pangkat->golongan }}</td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                @if ($dataStaff->jenis_kelamin == 'l')
                  <td class="text-secondary" id="edit-jenis_kelamin">Laki-Laki</td>
                @elseif($dataStaff->jenis_kelamin == 'p')
                  <td class="text-secondary" id="edit-jenis_kelamin">Perempuan</td>
                @endif
              </tr>
              <tr>
                <th>Tempat Lahir</th>
                <td class="text-secondary" id="edit-tempat_lahir">{{ $dataStaff->tempat_lahir }}</td>
              </tr>
              <tr>
                <th>Tanggal Lahir</th>
                <td class="text-secondary" id="edit-tanggal_lahir">{{ $dataStaff->tanggal_lahir }}</td>
              </tr>
              <tr>
                <th>Nomor Telepon</th>
                <td class="text-secondary" id="edit-nomor_telepon">{{ $dataStaff->nomor_telepon }}</td>
              </tr>
              <tr>
                <th>Fax</th>
                <td class="text-secondary" id="edit-fax">{{ $dataStaff->fax }}</td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td class="text-secondary" id="edit-alamat">{{ $dataStaff->alamat }}</td>
              </tr>
            </tbody>
          </table>
          <button type="button" onclick="setEditField()" id="edit-btn" class="btn btn-secondary mx-2">Edit</button>
          <button type="button" onclick="cancelEditField()" id="cancel-edit-btn" class="btn btn-secondary d-none">Batal</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    let editable = false;
    let editableProfile = false;
    setLongName();

    function setLongName() {
      let xhttp = new XMLHttpRequest();
      let dataNamaLengkap = document.getElementById('nama_lengkap_dan_gelar');

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            if(data.gelar_belakang == '-') {
              dataNamaLengkap.innerText = `${data.gelar_depan.replaceAll('-', '')} ${data.nama_lengkap}`;
            } else {
              dataNamaLengkap.innerText = `${data.gelar_depan.replaceAll('-', '')} ${data.nama_lengkap}, ${data.gelar_belakang}`;
            }
          }
        }
      };
      
      xhttp.open('GET', '{{ route("profile.getNameAndGelar") }}', true);
      xhttp.send();
    }

    function setEditProfilField() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();
      let img = document.getElementById('profile_img');
      let profileField = document.getElementById('img_file');
      let alertImg = document.getElementById('alert-img');
      let btn = document.getElementById('img-add-btn');
      let btnDefault = document.getElementById('img-edit-default-btn');
      let btnCancel = document.getElementById('img-add-cancel-btn');
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      if(editableProfile) {
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            if(data.status == 'success') {
              let path = '{{ asset("storage/__PATH__") }}';
              img.setAttribute('src', path.replace('__PATH__', data.path));
              btn.innerText = "Edit gambar profil";
              btn.classList.add('btn-secondary');
              btn.classList.remove('btn-primary');
              profileField.classList.add('d-none');
              alertImg.classList.add('d-none');
              btnCancel.classList.add('d-none');
              btnDefault.classList.add('d-none');
              editableProfile = false;

              Swal.fire({
                title: "Berhasil",
                text: "Berhasil mengedit foto profil!",
                icon: "success"
              });
            } else {
              Swal.fire({
                title: "Error",
                text: "Gagal mengedit foto profil!",
                icon: "error"
              });
            }
          }
        };

        formData.append('profile_image', profileField.files[0]);
        formData.append('_token', token);

        xhttp.open('POST', '{{ route("profile.updateProfileImage") }}', true);
        xhttp.send(formData);
      } else {
        btn.innerText = "Simpan";
        btn.classList.remove('btn-secondary');
        btn.classList.add('btn-primary');
        profileField.classList.remove('d-none');
        alertImg.classList.remove('d-none');
        btnCancel.classList.remove('d-none');
        btnDefault.classList.remove('d-none');
        editableProfile = true;
      }
    }

    function setCancelEditProfilField() {
      let profileField = document.getElementById('img_file');
      let alertImg = document.getElementById('alert-img');
      let btn = document.getElementById('img-add-btn');
      let btnCancel = document.getElementById('img-add-cancel-btn');
      let btnDefault = document.getElementById('img-edit-default-btn');

      btn.innerText = "Edit gambar profil";
      btn.classList.add('btn-secondary');
      btn.classList.remove('btn-primary');
      profileField.classList.add('d-none');
      alertImg.classList.add('d-none');
      btnCancel.classList.add('d-none');
      btnDefault.classList.add('d-none');
      editableProfile = false;
    }

    function cancelEditField() {
      let btnEdit = document.getElementById('edit-btn');
      let btnEditCancel = document.getElementById('cancel-edit-btn');

      let dataNamaLengkap = document.getElementById('edit-nama_lengkap');
      let dataGelarDepan = document.getElementById('edit-gelar_depan');
      let dataGelarBelakang = document.getElementById('edit-gelar_belakang');
      let dataNIP = document.getElementById('edit-nip');
      let dataNIDN = document.getElementById('edit-nidn');
      let dataJabatanFungsional = document.getElementById('edit-jabatan_fungsional');
      let dataGolongan = document.getElementById('edit-golongan');
      let dataJenisKelamin = document.getElementById('edit-jenis_kelamin');
      let dataTempatLahir = document.getElementById('edit-tempat_lahir');
      let dataTanggalLahir = document.getElementById('edit-tanggal_lahir');
      let dataNomorTelepon = document.getElementById('edit-nomor_telepon');
      let dataFax = document.getElementById('edit-fax');
      let dataAlamat = document.getElementById('edit-alamat');

      dataNamaLengkap.innerHTML = dataNamaLengkap.childNodes[0].value;
      dataGelarDepan.innerHTML = dataGelarDepan.childNodes[0].value;
      dataGelarBelakang.innerHTML = dataGelarBelakang.childNodes[0].value;
      dataNIP.innerHTML = dataNIP.childNodes[0].value;
      dataNIDN.innerHTML = dataNIDN.childNodes[0].value;
      dataJabatanFungsional.innerHTML = dataJabatanFungsional.childNodes[0].value;
      dataGolongan.innerHTML = dataGolongan.childNodes[0].value;
      dataJenisKelamin.innerHTML = dataJenisKelamin.childNodes[0].value;
      dataTempatLahir.innerHTML = dataTempatLahir.childNodes[0].value;
      dataTanggalLahir.innerHTML = dataTanggalLahir.childNodes[0].value;
      dataNomorTelepon.innerHTML = dataNomorTelepon.childNodes[0].value;
      dataFax.innerHTML = dataFax.childNodes[0].value;
      dataAlamat.innerHTML = dataAlamat.childNodes[0].value;

      btnEdit.classList.add('btn-secondary');
      btnEdit.classList.remove('btn-primary');
      btnEdit.innerText = 'Edit';
      btnEditCancel.classList.add('d-none');
    }

    function setEditField() {
      let btnEdit = document.getElementById('edit-btn');
      let btnEditCancel = document.getElementById('cancel-edit-btn');
      let dataNamaLengkapDanGelar = document.getElementById('nama_lengkap_dan_gelar');
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      let dataNamaLengkap = document.getElementById('edit-nama_lengkap');
      let dataGelarDepan = document.getElementById('edit-gelar_depan');
      let dataGelarBelakang = document.getElementById('edit-gelar_belakang');
      let dataNIP = document.getElementById('edit-nip');
      let dataNIDN = document.getElementById('edit-nidn');
      let dataJabatanFungsional = document.getElementById('edit-jabatan_fungsional');
      let dataGolongan = document.getElementById('edit-golongan');
      let dataJenisKelamin = document.getElementById('edit-jenis_kelamin');
      let dataTempatLahir = document.getElementById('edit-tempat_lahir');
      let dataTanggalLahir = document.getElementById('edit-tanggal_lahir');
      let dataNomorTelepon = document.getElementById('edit-nomor_telepon');
      let dataFax = document.getElementById('edit-fax');
      let dataAlamat = document.getElementById('edit-alamat');

      if(editable) {
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            if(data.status == 'success') {
              dataNamaLengkap.innerHTML = `${data.dataStaff.nama_lengkap}`;
              dataGelarDepan.innerHTML = `${data.dataStaff.gelar_depan}`;
              dataGelarBelakang.innerHTML = `${data.dataStaff.gelar_belakang}`;
              dataNIP.innerHTML = `${data.dataStaff.NIP}`;
              dataNIDN.innerHTML = `${data.dataStaff.NIDN}`;
              dataJabatanFungsional.innerHTML = `${data.dataJabatan.nama_jabatan}`;
              dataGolongan.innerHTML = `${data.dataPangkat.golongan}`;

              if(data.dataStaff.jenis_kelamin == 'l') {
                dataJenisKelamin.innerHTML = 'Laki-Laki';
              } else if(data.dataStaff.jenis_kelamin == 'p') {
                dataJenisKelamin.innerHTML = 'Perempuan';
              }

              dataTempatLahir.innerHTML = `${data.dataStaff.tempat_lahir}`;
              dataTanggalLahir.innerHTML = `${data.dataStaff.tanggal_lahir}`;
              dataNomorTelepon.innerHTML = `${data.dataStaff.nomor_telepon}`;
              dataFax.innerHTML = `${data.dataStaff.fax}`;
              dataAlamat.innerHTML = `${data.dataStaff.alamat}`;

              editable = false;
              btnEdit.classList.remove('btn-primary');
              btnEdit.classList.add('btn-secondary');
              btnEditCancel.classList.add('d-none');
              btnEdit.innerText = 'Edit';
              setLongName();
              Swal.fire({
                title: "Berhasil",
                text: "Berhasil mengedit data profil!",
                icon: "success"
              });
            } else {
              Swal.fire({
                title: "Error",
                text: "Gagal mengedit data profil!",
                icon: "error"
              });
            }
          }
        };

        if(dataGelarDepan.childNodes[0].value != '') {
          formData.append('gelar_depan', dataGelarDepan.childNodes[0].value);
        } else {
          formData.append('gelar_depan', '-');
        }
        if(dataGelarBelakang.childNodes[0].value != '') {
          formData.append('gelar_belakang', dataGelarBelakang.childNodes[0].value);
        } else {
          formData.append('gelar_belakang', '-');
        }
        if(dataNomorTelepon.childNodes[0].value != '') {
          formData.append('nomor_telepon', dataNomorTelepon.childNodes[0].value);
        } else {
          formData.append('nomor_telepon', '-');
        }
        if(dataFax.childNodes[0].value != '') {
          formData.append('fax', dataFax.childNodes[0].value);
        } else {
          formData.append('fax', '-');
        }
        if(dataAlamat.childNodes[0].value != '') {
          formData.append('alamat', dataAlamat.childNodes[0].value);
        } else {
          formData.append('alamat', '-');
        }
        formData.append('nama_lengkap', dataNamaLengkap.childNodes[0].value);
        formData.append('nip', dataNIP.childNodes[0].value);
        formData.append('nidn', dataNIDN.childNodes[0].value);
        formData.append('jabatan_fungsional', dataJabatanFungsional.childNodes[0].value);
        formData.append('golongan', dataGolongan.childNodes[0].value);
        formData.append('jenis_kelamin', dataJenisKelamin.childNodes[1].value);
        formData.append('tempat_lahir', dataTempatLahir.childNodes[0].value);
        formData.append('tanggal_lahir', dataTanggalLahir.childNodes[0].value);
        formData.append('_token', token);
        formData.append('_method', 'PATCH');
        
        xhttp.open('POST', "{{ route('profil.update', ['profil' => Auth::user()->id_staff]) }}", true);
        xhttp.send(formData);
      } else {
        editable = true;
        btnEdit.classList.remove('btn-secondary');
        btnEdit.classList.add('btn-primary');
        btnEditCancel.classList.remove('d-none');
        btnEdit.innerText = 'Simpan';

        let xhttp2 = new XMLHttpRequest();
        xhttp2.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            if(data.status == 'success') {
              let dataOldJabatan = dataJabatanFungsional.innerText;
              dataJabatanFungsional.innerHTML = '<select class="form-select" id="edit-option-jabatan_fungsional" onchange="changeGolongan()">';
              data.dataJabatan.forEach(element => {
                if(element.nama_jabatan == dataOldJabatan) {
                  dataJabatanFungsional.childNodes[0].innerHTML += `<option value="${element.id_jabatan}" selected>${element.nama_jabatan}</option>`;
                } else {
                  dataJabatanFungsional.childNodes[0].innerHTML += `<option value="${element.id_jabatan}">${element.nama_jabatan}</option>`;
                }
              });
              dataJabatanFungsional.innerHTML += '</select>';
              changeGolongan();
            }
          }
        };
        xhttp2.open('GET', '{{ route("jabatan.getJabatan") }}', false);
        xhttp2.send();

        dataNamaLengkap.innerHTML = `<input type="text" value="${dataNamaLengkap.innerText}" class="form-control">`;
        dataGelarDepan.innerHTML = `<input type="text" value="${dataGelarDepan.innerText}" class="form-control">`;
        dataGelarBelakang.innerHTML = `<input type="text" value="${dataGelarBelakang.innerText}" class="form-control">`;
        dataNIP.innerHTML = `<input type="text" value="${dataNIP.innerText}" class="form-control">`;
        dataNIDN.innerHTML = `<input type="text" value="${dataNIDN.innerText}" class="form-control">`;

        if(dataJenisKelamin.innerText == 'Laki-Laki') {
          dataJenisKelamin.innerHTML = `
            <select class="form-select" id="edit-option-jenis_kelamin">
              <option value="l" selected>Laki-Laki</option>
              <option value="p">Perempuan</option>
            </select>
          `;
        } else if(dataJenisKelamin.innerText == 'Perempuan') {
          dataJenisKelamin.innerHTML = `
            <select class="form-select" id="edit-option-jenis_kelamin">
              <option value="l">Laki-Laki</option>
              <option value="p" selected>Perempuan</option>
            </select>
          `;
        }

        dataTempatLahir.innerHTML = `<input type="text" value="${dataTempatLahir.innerText}" class="form-control">`;
        dataTanggalLahir.innerHTML = `<input type="text" value="${dataTanggalLahir.innerText}" class="form-control">`;
        dataNomorTelepon.innerHTML = `<input type="text" value="${dataNomorTelepon.innerText}" class="form-control">`;
        dataFax.innerHTML = `<input type="text" value="${dataFax.innerText}" class="form-control">`;
        dataAlamat.innerHTML = `<input type="text" value="${dataAlamat.innerText}" class="form-control">`;
      }
    }
    
    function setDefaultProfile() {
      let xhttp = new XMLHttpRequest();
      let img = document.getElementById('profile_img');

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            let path = '{{ asset("storage/__PATH__") }}';
            img.setAttribute('src', path.replace('__PATH__', data.path));
            Swal.fire({
              title: "Berhasil",
              text: "Berhasil menghapus foto profil!",
              icon: "success"
            });
          } else {
            Swal.fire({
              title: "Error",
              text: "Gagal menghapus foto profil!",
              icon: "error"
            });
          }
        }
      };

      xhttp.open('GET', '{{ route("profile.updateProfileImageDefault") }}', true);
      xhttp.send();
    }
  
    function changeGolongan() {
      let xhttp3 = new XMLHttpRequest();
      let dataJabatanFungsional = document.getElementById('edit-jabatan_fungsional');
      let dataGolongan = document.getElementById('edit-golongan');

      xhttp3.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            let dataOldPangkat = dataGolongan.innerText;
            dataGolongan.innerHTML = '<select class="form-select" id="edit-option-golongan">';
            data.dataPangkat.forEach(element => {
              if(element.golongan == dataOldPangkat) {
                dataGolongan.childNodes[0].innerHTML += `<option value="${element.id_pangkat}" selected>${element.golongan}</option>`;
              } else {
                dataGolongan.childNodes[0].innerHTML += `<option value="${element.id_pangkat}">${element.golongan}</option>`;
              }
            });
            dataGolongan.innerHTML += '</select>';
          }
        }
      };
      let url = '{{ route("pangkat.getPangkat", ["pangkat" => "__ID__"]) }}';
      xhttp3.open('GET', url.replace('__ID__', dataJabatanFungsional.childNodes[0].value), false);
      xhttp3.send();
    }
  </script>
@endsection