<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pelanggan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data Utama</a></li>
            <li class="breadcrumb-item active">Pelanggan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h5>Ini Halaman Pelanggan </h5>
        </div>
        <div class="card-body">
          
          <table id="example1" class="table table-hover">
            <thead class="bg-purple">
              <th>Pelanggan Id</th>
              <th>Nama pelanggan</th>
              <th>Alamat</th>
              <th>NomorTelepon</th>
              <th>Aksi</th>
            </thead>
            <?php
            $sql = "SELECT * FROM pelanggan";
            $query = mysqli_query($koneksi, $sql);
            while ($kolom = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?= $kolom['pelangganid']; ?></td>
                <td><?= $kolom['namapelanggan']; ?></td>
                <td><?= $kolom['alamat']; ?></td>
                <td><?= $kolom['nomortelepon']; ?></td>
                <td>
                  <!--Tombol hapus -->
                  <a href="#" data-toggle="modal" data-target="#modalUbah<?= $kolom['pelangganid']; ?>"><i class="fas fa-edit"></i></a>
                  &nbsp;
                  <!--Tombol hapus -->
                  | <a onclick="return confirm('Yakin akan menghapus data ini?')" href="aksi/pelanggan.php?aksi=hapus&pelangganid=<?= $kolom['pelangganid']; ?>"> <i class="fas fa-trash"></i></a>
                </td>
              </tr>
              <!--Modal Ubah pelanggan-->
              <div class="modal fade" id="modalUbah<?= $kolom['pelangganid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah pelanggan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="aksi/pelanggan.php" method="post">
                        <input type="hidden" name="aksi" value="ubah">
                        <input type="hidden" name="pelangganid" value="<?= $kolom['pelangganid']; ?>">

                        <label for="nama pelanggan">Nama Pelanggan</label>
                        <input type="text" name="namapelanggan" value="<?= $kolom['namapelanggan']; ?>" class="form-control" require>
                        <br>
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" value="<?= $kolom['alamat']; ?>" class="form-control" require>
                        <br>
                        <label for="nomortelepon">Nomor telepon</label>
                        <input type="number" name="nomortelepon" value="<?= $kolom['nomortelepon']; ?>" class="form-control" require>
                        <br>
                        
                        <button type="submit" class="btn btn-block bg-purple"> <i class="fas fa-save">Simpan</i></button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                  </div>
                </div>
              </div>
            <?php
            } //Akhir While
            ?>
          </table>
          <button type="button" class="btn bg-purple btn-block mt-3" data-toggle="modal" data-target="#modalTambah"> <i class="fas fa-plus">Tambah pelanggan Baru </i></button>
        </div>
      </div>
    </div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--Modal Tambah pelanggan-->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="aksi/pelanggan.php" method="post">
          <input type="hidden" name="aksi" value="tambah">

          <label for="namapelanggan">Nama Pelanggan</label>
          <input type="text" name="namapelanggan" class="form-control" require>
          <br>
          <label for="alamat">Alamat</label>
          <input type="text" name="alamat" class="form-control" require>
          <br>
          <label for="nomortelepon">nomortelepon</label>
          <input type="number" name="nomortelepon" class="form-control" require>
          <br>

          <button type="submit" class="btn btn-block bg-purple"> <i class="fas fa-save">Simpan</i></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

