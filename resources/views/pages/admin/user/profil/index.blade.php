<h1 class="mt-4">Profil</h1>
<hr>
<a href=".?hal=tambahprofil" class="btn btn-primary">Tambah Data</a>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Nama Perusahaan</th>
          <th>Nama Pimpinan</th>
          <th>Telepon</th>
          <th>Alamat</th>
          <th>Jabatan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Nama Perusahaan</th>
          <th>Nama Pimpinan</th>
          <th>Telepon</th>
          <th>Alamat</th>
          <th>Jabatan</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
      <tbody>
        <?php
        $sql = "SELECT * FROM tb_biodata";
        $q = mysqli_query($k, $sql);
        while ($r = mysqli_fetch_assoc($q)) {
        ?>
          <tr>
            <td><?= $r['Nama_Perusahaan'] ?></td>
            <td><?= $r['Nama_Pimpinan'] ?></td>
            <td><?= $r['Telepon'] ?></td>
            <td><?= $r['Alamat'] ?></td>
            <td><?= $r['Jabatan'] ?></td>
            <!-- <td>
                        < src="../Alamat/<?= $r['Alamat'] ?>" alt="" width="177" height="236">
                    </td> -->
            <td>
              <a href=".?hal=ubahprofil&id=<?= $r['id_biodata'] ?>">Ubah</a>
              -
              <a onclick="return confirm('Yakin?')" href=".?hal=hapusprofil&id=<?= $r['id_biodata'] ?>">Hapus</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>