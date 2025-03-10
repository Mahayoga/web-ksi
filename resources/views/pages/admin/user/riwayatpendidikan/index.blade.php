@extends('layouts.admin.app')
@section('content')
  <h1 class="mt-4">Data Riwayat Pendidikan</h1>
  <hr>
  <a href="" onclick="addModalRiwayat()" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary"><i class="fas fa-add me-2"></i>Tambah Data</a>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pemilik</th>
            <th>Perguruan Tinggi</th>
            <th>Bidang Ilmu</th>
            <th>Gelar</th>
            <th>Pembimbing</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
          @php $i = 1; @endphp
          @foreach ($dataRiwayat as $item)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $dataPemilik[$i - 1]->gelar_depan }} {{ $dataPemilik[$i - 1]->nama_lengkap }} {{ $dataPemilik[$i - 1]->gelar_belakang }}</td>
              <td>{{ $dataKampus[$i - 1]->nama_kampus }}</td>
              <td>{{ $dataBidangIlmu[$i - 1]->nama_bidang_ilmu }}</td>
              <td>{{ $dataBidangIlmu[$i - 1]->jenjang }}</td>
              <td>{{ $dataPembimbing[$i - 1]->gelar_depan }} {{ $dataPembimbing[$i - 1]->nama_lengkap }} {{ $dataPembimbing[$i - 1]->gelar_belakang }}</td>
              <td class="d-flex">
                <a href="" class="btn btn-secondary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick="showModalRiwayat('{{ $item->id_riwayat }}')"><i class="fas fa-eye"></i></a>
                <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editModalRiwayat('{{ $item->id_riwayat }}')"><i class="fas fa-edit"></i></a>
                <a href="" class="btn btn-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModalRiwayat('{{ $item->id_riwayat }}')"><i class="fas fa-trash-can"></i></a>
              </td>
            </tr>
          @php $i += 1; @endphp
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Add Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Riwayat Pendidikan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>Nama Pemilik</th>
                <td>
                  <select class="form-select" onchange="setPenelitian(); getPembimbing();" name="pemilik_riwayat-add" id="pemilik_riwayat-add"></select>
                </td>
              </tr>
              <tr>
                <th>Nama Perguruan Tinggi</th>
                <td>
                  <select class="form-select" onchange="getBidangIlmu()" name="nama_perguruan_tinggi-add" id="nama_perguruan_tinggi-add"></select>
                </td>
              </tr>
              <tr>
                <th>Bidang Ilmu</th>
                <td>
                  <select disabled name="nama_bidang_ilmu-add" onchange="getJenjang()" id="nama_bidang_ilmu-add" class="form-select">
                    <option value="not-selected">Pilih Perguruan Tinggi terlebih dahulu</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th>Tahun Masuk - Lulus</th>
                <td class="d-flex">
                  <span class="me-4">
                    <select name="tahun_masuk-add" onchange="setTahunLulus()" id="tahun_masuk-add" class="form-select">
                      <option value="not-selected">Pilih tahun masuk</option>
                    </select>
                  </span>
                  <span>
                    <select name="tahun_lulus-add" id="tahun_lulus-add" class="form-select">
                      <option value="not-selected">Pilih tahun lulus</option>
                    </select>
                  </span>
                </td>
              </tr>
              <tr>
                <th>Gelar</th>
                <td>
                  <input type="text" disabled name="gelar-add" id="gelar-add" class="form-control" value="Pilih bidang ilmu">
                </td>
              </tr>
              <tr>
                <th>Penelitian</th>
                <td>
                  <select disabled name="penelitian-add" id="penelitian-add" class="form-select">
                    <option value="not-selected">Pilih pemilik terlebih dahulu</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th>Pembimbing</th>
                <td>
                  <select disabled name="pembimbing-add" id="pembimbing-add" class="form-select">
                    <option value="not-selected">Pilih pemilik terlebih dahulu</option>
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" onclick="simpanDataRiwayat()" data-bs-dismiss="modal">Tambahkan!</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Riwayat Pendidikan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>Nama Pemilik</th>
                <td>
                  <select disabled class="form-select" onchange="setPenelitianEdit(); getPembimbingEdit();" name="pemilik_riwayat-edit" id="pemilik_riwayat-edit"></select>
                </td>
              </tr>
              <tr>
                <th>Nama Perguruan Tinggi</th>
                <td>
                  <select class="form-select" onchange="getBidangIlmuEdit()" name="nama_perguruan_tinggi-edit" id="nama_perguruan_tinggi-edit"></select>
                </td>
              </tr>
              <tr>
                <th>Bidang Ilmu</th>
                <td>
                  <select disabled name="nama_bidang_ilmu-edit" onchange="getJenjangEdit()" id="nama_bidang_ilmu-edit" class="form-select">
                    <option value="not-selected">Pilih Perguruan Tinggi terlebih dahulu</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th>Tahun Masuk - Lulus</th>
                <td class="d-flex">
                  <span class="me-4">
                    <select name="tahun_masuk-edit" onchange="setTahunLulusEdit()" id="tahun_masuk-edit" class="form-select">
                      <option value="not-selected">Pilih tahun masuk</option>
                    </select>
                  </span>
                  <span>
                    <select name="tahun_lulus-edit" id="tahun_lulus-edit" class="form-select">
                      <option value="not-selected">Pilih tahun lulus</option>
                    </select>
                  </span>
                </td>
              </tr>
              <tr>
                <th>Gelar</th>
                <td>
                  <input type="text" disabled name="gelar-edit" id="gelar-edit" class="form-control" value="Pilih bidang ilmu">
                </td>
              </tr>
              <tr>
                <th>Penelitian</th>
                <td>
                  <select disabled name="penelitian-edit" id="penelitian-edit" class="form-select">
                    <option value="not-selected">Pilih pemilik terlebih dahulu</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th>Pembimbing</th>
                <td>
                  <select disabled name="pembimbing-edit" id="pembimbing-edit" class="form-select">
                    <option value="not-selected">Pilih pemilik terlebih dahulu</option>
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" onclick="simpanDataRiwayatEdit()" data-bs-dismiss="modal">Edit!</button>
        </div>
      </div>
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
                <th>Nama Pemilik</th>
                <td id="nama_pemilik"></td>
              </tr>
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
    let idEdit = null;
    let idHapus = null;
    function setGelarInName(gelar_depan, nama, gelar_belakang) {
      return gelar_depan + " " + nama + " " + gelar_belakang;
    }

    function deleteModalRiwayat(id) {
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
                ambilData();
              } else {
                Swal.fire("Error", "Terjadi error saat menghapus data!\n" + data.msg, "error");
              }
            }
          };

          let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
          let route = "{{ route('riwayatpendidikan.destroy', ['riwayatpendidikan' => 'idHapus']) }}";
          xhttp.open('DELETE', route.replace('idHapus', idHapus), true);
          xhttp.setRequestHeader('X-CSRF-TOKEN', token);
          xhttp.send();
        }
      });
    }

    function ambilData() {
      let xhttp = new XMLHttpRequest();
      let tbody = document.querySelector('tbody');

      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          let data = JSON.parse(this.responseText);
          console.log(data);
          tbody.innerHTML = "";
          for(var i = 0; i < data.dataRiwayat.length; i++) {
            tbody.innerHTML += `
              <tr>
                <td>${i + 1}</td>
                <td>${ setGelarInName(data.dataPemilik[i].gelar_depan, data.dataPemilik[i].nama_lengkap, data.dataPemilik[i].gelar_belakang) }</td>
                <td>${ data.dataKampus[i].nama_kampus }</td>
                <td>${ data.dataBidangIlmu[i].nama_bidang_ilmu }</td>
                <td>${ data.dataBidangIlmu[i].jenjang }</td>
                <td>${ setGelarInName(data.dataPembimbing[i].gelar_depan, data.dataPembimbing[i].nama_lengkap, data.dataPembimbing[i].gelar_belakang) }</td>
                <td class="d-flex">
                  <a href="" class="btn btn-secondary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick="showModalRiwayat('${ data.dataRiwayat[i].id_riwayat }')"><i class="fas fa-eye"></i></a>
                  <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editModalRiwayat('${ data.dataRiwayat[i].id_riwayat }')"><i class="fas fa-edit"></i></a>
                  <a href="" class="btn btn-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModalRiwayat('${ data.dataRiwayat[i].id_riwayat }')"><i class="fas fa-trash-can"></i></a>
                </td>
              </tr>
            `;
          }
          setGelarInName();
        }
      };

      xhttp.open('GET', '{{ route("riwayatpendidikan.getData") }}', true);
      xhttp.send();
    }

    function simpanDataRiwayat() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      let dataPemilik = document.getElementById('pemilik_riwayat-add').value;
      let dataKampus = document.getElementById('nama_perguruan_tinggi-add').value;
      let dataBidangIlmu = document.getElementById('nama_bidang_ilmu-add').value;
      let dataTahunMasuk = document.getElementById('tahun_masuk-add').value;
      let dataTahunLulus = document.getElementById('tahun_lulus-add').value;
      let dataGelar = document.getElementById('gelar-add').value;
      let dataPenelitian = document.getElementById('penelitian-add').value;
      let dataPembimbing = document.getElementById('pembimbing-add').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('pemilik', dataPemilik);
      formData.append('kampus', dataKampus);
      formData.append('bidangIlmu', dataBidangIlmu);
      formData.append('tahunMasuk', dataTahunMasuk);
      formData.append('tahunLulus', dataTahunLulus);
      formData.append('gelar', dataGelar);
      formData.append('penelitian', dataPenelitian);
      formData.append('pembimbing', dataPembimbing);
      // formData.append('_token', token);

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            Swal.fire({
              title: "Berhasil",
              text: "Berhasil menambahkan data baru!",
              icon: "success"
            });
            ambilData();
          } else {
            Swal.fire({
              title: "Error",
              text: "Terdapat error, silahkan coba lagi nanti!",
              icon: "error"
            });
          }
        }
      };

      xhttp.open('POST', '{{ route("riwayatpendidikan.store") }}', true);
      xhttp.setRequestHeader('X-CSRF-TOKEN', token);
      xhttp.send(formData);
    }

    function setPenelitian() {
      let pemilikRiwayat = document.getElementById('pemilik_riwayat-add');
      let penelitian = document.getElementById('penelitian-add');
      let xhttp = new XMLHttpRequest();
      if(pemilikRiwayat.value != 'not-selected') {
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            if(data.status == 'success') {
              penelitian.innerHTML = `<option selected value="not-selected">Pilih</option>`;
              penelitian.removeAttribute('disabled');
              data.dataPenelitian.forEach(element => {
                penelitian.innerHTML += `
                  <option value="${element.id_penelitian}">${element.judul_penelitian}</option>
                `;
              });
            } else {
              penelitian.setAttribute('disabled', '');
              penelitian.innerHTML = `
                <option value="not-selected">Tambahkan penelitian terlebih dahulu untuk pemilik ini</option>
              `;
            }
          }
        };
      } else {
        penelitian.setAttribute('disabled', '');
        penelitian.innerHTML = `
          <option value="not-selected">Pilih pemilik terlebih dahulu</option>
        `;
      }

      let route = "{{ route('riwayatpendidikan.getPenelitianPemilik', ['id' => '__ID__']) }}"

      xhttp.open('GET', route.replace('__ID__', pemilikRiwayat.value), true);
      xhttp.send();
    }

    function setTahunLulus() {
      let tahunMasuk = document.getElementById('tahun_masuk-add');
      let tahunLulus = document.getElementById('tahun_lulus-add');
      let date = new Date();
      if(tahunMasuk.value != "not-selected") {
        tahunLulus.innerHTML = `<option value="not-selected">Pilih tahun lulus</option>`;
        for(var i = parseInt(tahunMasuk.value) + 1; i <= parseInt(date.getFullYear()); i++) {
          tahunLulus.innerHTML += `
            <option value="${i}">${i}</option>
          `;
        }
      } else {
        tahunLulus.innerHTML = `<option value="not-selected">Pilih tahun lulus</option>`;
      }
    }

    function setTahunMasuk() {
      let tahunMasuk = document.getElementById('tahun_masuk-add');
      let date = new Date();

      for(var i = parseInt(date.getFullYear()); i >= 1980; i--) {
        tahunMasuk.innerHTML += `
          <option value=${i}>${i}</option>
        `;
      }
    }
    setTahunMasuk();

    function getBidangIlmu() {
      let perguruanTinggi = document.getElementById('nama_perguruan_tinggi-add');
      if(perguruanTinggi.value != 'not-selected') {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            if(data.status == 'success') {
              let optionBidangIlmu = document.getElementById('nama_bidang_ilmu-add');
              optionBidangIlmu.innerHTML = `<option value="not-selected" selected>--Pilih--</option>`;
              optionBidangIlmu.removeAttribute('disabled');
              data.dataBidangIlmu.forEach(element => {
                optionBidangIlmu.innerHTML += `
                  <option value="${element.id_bidang_ilmu}">${element.nama_bidang_ilmu}</option>
                `;
              });
            } else {
              let optionBidangIlmu = document.getElementById('nama_bidang_ilmu-add');
              optionBidangIlmu.setAttribute('disabled', '')
              optionBidangIlmu.innerHTML = `<option value="not-selected" selected>Tidak ada bidang ilmu yang tersedia pada kampus tersebut</option>`;
            }
          }
        };

        let route = '{{ route("riwayatpendidikan.getBidangPendidikan", ["id", "__ID__"]) }}'

        xhttp.open('GET', route.replace('id?__ID__', perguruanTinggi.value), true);
        xhttp.send();
      } else {
        let optionBidangIlmu = document.getElementById('nama_bidang_ilmu-add');
        optionBidangIlmu.innerHTML = `<option value="not-selected" selected>Pilih Perguruan Tinggi terlebih dahulu</option>`;
        optionBidangIlmu.setAttribute('disabled', '');
      }
    }

    function getJenjang() {
      let gelar = document.getElementById('gelar-add');
      let optionBidangIlmu = document.getElementById('nama_bidang_ilmu-add');
      if(optionBidangIlmu.value != 'not-selected') {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            if(data.status == 'success') {
              gelar.value = data.dataBidangIlmu.jenjang;
            }
          }
        };

        let route = '{{ route("riwayatpendidikan.getJenjang", ["id", "__ID__"]) }}'

        xhttp.open('GET', route.replace('id?__ID__', optionBidangIlmu.value), true);
        xhttp.send();
      } else {
        gelar.value = "";
      }
    }

    function getPembimbing() {
      let pemilik = document.getElementById('pemilik_riwayat-add');
      let pembimbing = document.getElementById('pembimbing-add');
      let xhttp = new XMLHttpRequest();
      if(pemilik.value != "not-selected") {
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            pembimbing.removeAttribute('disabled');
            pembimbing.innerHTML = `<option value="not-selected">Pilih</option>`;
            data.dataPembimbing.forEach(element => { 
              pembimbing.innerHTML += `<option value="${element.id_staff}">${setGelarInName(element.gelar_depan, element.nama_lengkap, element.gelar_belakang)}</option>`;
            });
          }
        };
      } else {
        pembimbing.setAttribute('disabled', '');
        pembimbing.innerHTML = `<option value="not-selected">Pilih pemilik terlebih dahulu</option>`;
      }

      let route = "{{ route('riwayatpendidikan.getPembimbingNot', ['id' => '__ID__']) }}"

      xhttp.open('GET', route.replace('__ID__', pemilik.value), true);
      xhttp.send();
    }

    function simpanDataRiwayatEdit() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      let dataPemilik = document.getElementById('pemilik_riwayat-edit').value;
      let dataKampus = document.getElementById('nama_perguruan_tinggi-edit').value;
      let dataBidangIlmu = document.getElementById('nama_bidang_ilmu-edit').value;
      let dataTahunMasuk = document.getElementById('tahun_masuk-edit').value;
      let dataTahunLulus = document.getElementById('tahun_lulus-edit').value;
      let dataGelar = document.getElementById('gelar-edit').value;
      let dataPenelitian = document.getElementById('penelitian-edit').value;
      let dataPembimbing = document.getElementById('pembimbing-edit').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('pemilik', dataPemilik);
      formData.append('kampus', dataKampus);
      formData.append('bidangIlmu', dataBidangIlmu);
      formData.append('tahunMasuk', dataTahunMasuk);
      formData.append('tahunLulus', dataTahunLulus);
      formData.append('gelar', dataGelar);
      formData.append('penelitian', dataPenelitian);
      formData.append('pembimbing', dataPembimbing);
      formData.append('_method', 'PATCH');

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            Swal.fire({
              title: "Berhasil",
              text: "Berhasil menambahkan data baru!",
              icon: "success"
            });
            ambilData();
          } else {
            Swal.fire({
              title: "Error",
              text: "Terdapat error, silahkan coba lagi nanti!",
              icon: "error"
            });
          }
        }
      };

      
      let route = '{{ route("riwayatpendidikan.update", ["riwayatpendidikan" => "idEdit"]) }}';
      xhttp.open('POST', route.replace('idEdit', idEdit), true);
      xhttp.setRequestHeader('X-CSRF-TOKEN', token);
      xhttp.send(formData);
    }

    function setPenelitianEdit() {
      let pemilikRiwayat = document.getElementById('pemilik_riwayat-edit');
      let penelitian = document.getElementById('penelitian-edit');
      let xhttp = new XMLHttpRequest();
      if(pemilikRiwayat.value != 'not-selected') {
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            if(data.status == 'success') {
              penelitian.innerHTML = `<option selected value="not-selected">Pilih</option>`;
              penelitian.removeAttribute('disabled');
              data.dataPenelitian.forEach(element => {
                penelitian.innerHTML += `
                  <option value="${element.id_penelitian}">${element.judul_penelitian}</option>
                `;
              });
            } else {
              penelitian.setAttribute('disabled', '');
              penelitian.innerHTML = `
                <option value="not-selected">Tambahkan penelitian terlebih dahulu untuk pemilik ini</option>
              `;
            }
          }
        };
      } else {
        penelitian.setAttribute('disabled', '');
        penelitian.innerHTML = `
          <option value="not-selected">Pilih pemilik terlebih dahulu</option>
        `;
      }

      let route = "{{ route('riwayatpendidikan.getPenelitianPemilik', ['id' => '__ID__']) }}"

      xhttp.open('GET', route.replace('__ID__', pemilikRiwayat.value), false);
      xhttp.send();
    }

    function setTahunLulusEdit() {
      let tahunMasuk = document.getElementById('tahun_masuk-edit');
      let tahunLulus = document.getElementById('tahun_lulus-edit');
      let date = new Date();
      if(tahunMasuk.value != "not-selected") {
        tahunLulus.innerHTML = `<option value="not-selected">Pilih tahun lulus</option>`;
        for(var i = parseInt(tahunMasuk.value) + 1; i <= parseInt(date.getFullYear()); i++) {
          tahunLulus.innerHTML += `
            <option value="${i}">${i}</option>
          `;
        }
      } else {
        tahunLulus.innerHTML = `<option value="not-selected">Pilih tahun lulus</option>`;
      }
    }

    function setTahunMasukEdit() {
      let tahunMasuk = document.getElementById('tahun_masuk-edit');
      let date = new Date();

      for(var i = parseInt(date.getFullYear()); i >= 1980; i--) {
        tahunMasuk.innerHTML += `
          <option value=${i}>${i}</option>
        `;
      }
    }
    setTahunMasukEdit();

    function getBidangIlmuEdit() {
      let perguruanTinggi = document.getElementById('nama_perguruan_tinggi-edit');
      if(perguruanTinggi.value != 'not-selected') {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            if(data.status == 'success') {
              let optionBidangIlmu = document.getElementById('nama_bidang_ilmu-edit');
              optionBidangIlmu.innerHTML = `<option value="not-selected" selected>--Pilih--</option>`;
              optionBidangIlmu.removeAttribute('disabled');
              data.dataBidangIlmu.forEach(element => {
                optionBidangIlmu.innerHTML += `
                  <option value="${element.id_bidang_ilmu}">${element.nama_bidang_ilmu}</option>
                `;
              });
            } else {
              let optionBidangIlmu = document.getElementById('nama_bidang_ilmu-edit');
              optionBidangIlmu.setAttribute('disabled', '')
              optionBidangIlmu.innerHTML = `<option value="not-selected" selected>Tidak ada bidang ilmu yang tersedia pada kampus tersebut</option>`;
            }
          }
        };

        let route = '{{ route("riwayatpendidikan.getBidangPendidikan", ["id", "__ID__"]) }}'

        xhttp.open('GET', route.replace('id?__ID__', perguruanTinggi.value), true);
        xhttp.send();
      } else {
        let optionBidangIlmu = document.getElementById('nama_bidang_ilmu-edit');
        optionBidangIlmu.innerHTML = `<option value="not-selected" selected>Pilih Perguruan Tinggi terlebih dahulu</option>`;
        optionBidangIlmu.setAttribute('disabled', '');
      }
    }

    function getJenjangEdit() {
      let gelar = document.getElementById('gelar-edit');
      let optionBidangIlmu = document.getElementById('nama_bidang_ilmu-edit');
      if(optionBidangIlmu.value != 'not-selected') {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            if(data.status == 'success') {
              gelar.value = data.dataBidangIlmu.jenjang;
            }
          }
        };

        let route = '{{ route("riwayatpendidikan.getJenjang", ["id", "__ID__"]) }}'

        xhttp.open('GET', route.replace('id?__ID__', optionBidangIlmu.value), true);
        xhttp.send();
      } else {
        gelar.value = "";
      }
    }

    function getPembimbingEdit() {
      let pemilik = document.getElementById('pemilik_riwayat-edit');
      let pembimbing = document.getElementById('pembimbing-edit');
      let xhttp = new XMLHttpRequest();
      if(pemilik.value != "not-selected") {
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            pembimbing.removeAttribute('disabled');
            pembimbing.innerHTML = `<option value="not-selected">Pilih</option>`;
            data.dataPembimbing.forEach(element => { 
              pembimbing.innerHTML += `<option value="${element.id_staff}">${setGelarInName(element.gelar_depan, element.nama_lengkap, element.gelar_belakang)}</option>`;
            });
          }
        };
      } else {
        pembimbing.setAttribute('disabled', '');
        pembimbing.innerHTML = `<option value="not-selected">Pilih pemilik terlebih dahulu</option>`;
      }

      let route = "{{ route('riwayatpendidikan.getPembimbingNot', ['id' => '__ID__']) }}"

      xhttp.open('GET', route.replace('__ID__', pemilik.value), false);
      xhttp.send();
    }

    function showModalRiwayat(id) {
      let xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);

          document.getElementById('nama_pemilik').innerText = setGelarInName(data.dataPemilik.gelar_depan, data.dataPemilik.nama_lengkap, data.dataPemilik.gelar_belakang);
          document.getElementById('nama_perguruan_tinggi').innerText = data.dataKampus.nama_kampus;
          document.getElementById('bidang_ilmu').innerText = data.dataBidangIlmu.nama_bidang_ilmu;
          document.getElementById('periode').innerText = data.dataRiwayat.tahun_masuk + " - " + data.dataRiwayat.tahun_lulus;
          document.getElementById('gelar').innerText = data.dataBidangIlmu.jenjang;
          document.getElementById('penelitian').innerText = data.dataPenelitian.judul_penelitian;
          document.getElementById('pembimbing').innerText = setGelarInName(data.dataPembimbing.gelar_depan, data.dataPembimbing.nama_lengkap, data.dataPembimbing.gelar_belakang);
        }
      };
      let data = "{{ route('riwayatpendidikan.show', ['riwayatpendidikan' => '__ID__']) }}";

      xhttp.open("GET", data.replace('__ID__', id), true);
      xhttp.send();
    }

    function addModalRiwayat() {
      let xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          let optionPemilikRiwayat = document.getElementById('pemilik_riwayat-add');
          let optionKampus = document.getElementById('nama_perguruan_tinggi-add');

          optionPemilikRiwayat.innerHTML = `<option value="not-selected" selected>--Pilih--</option>`;
          optionKampus.innerHTML = `<option value="not-selected" selected>--Pilih--</option>`;

          data.dataPemilik.forEach(element => {
            optionPemilikRiwayat.innerHTML += `
              <option value="${element.id_staff}">${setGelarInName(element.gelar_depan, element.nama_lengkap, element.gelar_belakang)}</option>
            `;
          });
          data.dataKampus.forEach(element => {
            optionKampus.innerHTML += `
              <option value="${element.id_kampus}">${element.nama_kampus}</option>
            `;
          });
        }
      };

      xhttp.open("GET", "{{ route('riwayatpendidikan.create') }}", true);
      xhttp.send();
    }

    function editModalRiwayat(id) {
      let xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          let optionPemilikRiwayat = document.getElementById('pemilik_riwayat-edit');
          let optionKampus = document.getElementById('nama_perguruan_tinggi-edit');
          let optionBidangilmu = document.getElementById('nama_bidang_ilmu-edit');
          let optionTahunMasuk = document.getElementById('tahun_masuk-edit');
          let optionTahunLulus = document.getElementById('tahun_lulus-edit');
          let optionGelar = document.getElementById('gelar-edit');
          let optionPenelitian = document.getElementById('penelitian-edit');
          let optionPembimbing = document.getElementById('pembimbing-edit');

          optionPemilikRiwayat.innerHTML = `<option value="${data.dataPemilik.id_staff}" selected>${setGelarInName(data.dataPemilik.gelar_depan, data.dataPemilik.nama_lengkap, data.dataPemilik.gelar_belakang)}</option>`;
          optionKampus.innerHTML = `<option value="${data.dataKampusEdit.id_kampus}" selected>${data.dataKampusEdit.nama_kampus}</option>`;
          optionBidangilmu.innerHTML = `<option value="${data.dataBidangIlmuEdit.id_bidang_ilmu}" selected>${data.dataBidangIlmuEdit.nama_bidang_ilmu}</option>`;
          optionGelar.value = `${data.dataBidangIlmuEdit.jenjang}`;

          data.dataKampus.forEach(element => {
            optionKampus.innerHTML += `
              <option value="${element.id_kampus}">${element.nama_kampus}</option>
            `;
          });
          data.dataIlmu.forEach(element => {
            optionBidangilmu.innerHTML += `
              <option value="${element.id_bidang_ilmu}">${element.nama_bidang_ilmu}</option>
            `;
          });          

          for(var i = 0; i < optionTahunMasuk.querySelectorAll('option').length; i++) {
            if(optionTahunMasuk.querySelectorAll('option')[i].value == data.dataRiwayat.tahun_masuk) {
              optionTahunMasuk.querySelectorAll('option')[i].setAttribute('selected', '');
              setTahunLulusEdit();
              for(var i = 0; i < optionTahunLulus.querySelectorAll('option').length; i++) {
                if(optionTahunLulus.querySelectorAll('option')[i].value == data.dataRiwayat.tahun_lulus) {
                  optionTahunLulus.querySelectorAll('option')[i].setAttribute('selected', '');
                }
              }
            }
          }

          setPenelitianEdit();
          getPembimbingEdit();
          for(var i = 0; i < optionPenelitian.querySelectorAll('option').length; i++) {
            if(optionPenelitian.querySelectorAll('option')[i].value == data.dataPenelitianEdit.id_penelitian) {
              optionPenelitian.querySelectorAll('option')[i].setAttribute('selected', '');
            }
          }
          for(var i = 0; i < optionPembimbing.querySelectorAll('option').length; i++) {
            if(optionPembimbing.querySelectorAll('option')[i].value == data.dataPembimbingEdit.id_staff) {
              optionPembimbing.querySelectorAll('option')[i].setAttribute('selected', '');
            }
          }
        }
      };

      idEdit = id;
      let route = "{{ route('riwayatpendidikan.edit', ['riwayatpendidikan' => '__ID__']) }}";

      xhttp.open("GET", route.replace('__ID__', id), true);
      xhttp.send();
    }
  </script>
@endsection