<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">user</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data Utama</a></li>
            <li class="breadcrumb-item active">user</li>
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
          <h5>Ini Halaman user </h5>
        </div>
        <div class="card-body">
          <button class="btn bg-purple mb-2" data-toggle="modal" data-target="#modalRecyleBin"><i class="fas fa-recycle"></i>Recycle Bin</button>
          <table id="example1" class="table table-hover">
            <thead class="bg-purple">
              <th>Id User</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Password</th>
              <th>Hak Akses</th>
              <th>Aksi</th>
            </thead>
            <?php
            $sql = "SELECT *FROM user  WHERE dihapus_pada IS NULL";
            $query = mysqli_query($koneksi, $sql);
            while ($kolom = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?= $kolom['id_user']; ?></td>
                <td><?= $kolom['nama']; ?></td>
                <td><?= $kolom['username']; ?></td>
                <td><?= $kolom['password']; ?></td>
                <td><?= $kolom['hak_akses']; ?></td>
                <td>
                  <!--Tombol hapus -->
                  <a href="#" data-toggle="modal" data-target="#modalUbah<?= $kolom['id_user']; ?>"><i class="fas fa-edit"></i></a>
                  &nbsp;
                  <!--Tombol hapus -->
                  | <a onclick="return confirm('Yakin akan menghapus data ini?')" href="aksi/user.php?aksi=hapus&id_user=<?= $kolom['id_user']; ?>"> <i class="fas fa-trash"></i></a>
                </td>
              </tr>
              <!--Modal Ubah user-->
              <div class="modal fade" id="modalUbah<?= $kolom['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah user</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="aksi/user.php" method="post">
                        <input type="hidden" name="aksi" value="ubah">
                        <input type="hidden" name="id_user" value="<?= $kolom['id_user']; ?>">

                        <label for="user">Nama</label>
                        <input type="text" name="nama" value="<?= $kolom['nama']; ?>" class="form-control" require>
                        <br>
                        <label for="user">Username</label>
                        <input type="text" name="username" value="<?= $kolom['username']; ?>" class="form-control" require>
                        <br>
                        <label for="user">Password</label>
                        <input type="text" name="password" value="<?= $kolom['password']; ?>" class="form-control" require>
                        <br>
                        <label for="user">Hak Akses</label>
                        <input type="option" name="hak_akses" value="<?= $kolom['hak_akses']; ?>" class="form-control" require>
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
          <button type="button" class="btn bg-purple btn-block mt-3" data-toggle="modal" data-target="#modalTambah"> <i class="fas fa-plus">Tambah user Baru </i></button>
        </div>
      </div>
    </div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--Modal Tambah user-->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="aksi/user.php" method="post">
          <input type="hidden" name="aksi" value="tambah">

          <label for="user">Nama</label>
          <input type="text" name="nama" class="form-control" require>
          <br>
          <label for="user">Username</label>
          <input type="text" name="username" class="form-control" require>
          <br>
          <label for="user">Password</label>
          <input type="password" name="password" class="form-control" require>
          <br>
          <label for="user">Hak Akses</label>
          <select class="form-control" id="hak_akses" name="hak_akses">
            <option value="1">1</option>
            <option value="2">2</option>
          </select>
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

<!--Modal Recyle Bin-->
<div class="modal fade" id="modalRecyleBin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Penghapusan Sementara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hover">
          <thead class="bg-purple">
            <th>Id User</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Dihapus Pada</th>
            <th>Aksi</th>
          </thead>
          <?php
          $sql = "SELECT *FROM user  WHERE dihapus_pada IS NOT NULL";
          $query = mysqli_query($koneksi, $sql);
          while ($kolom = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?= $kolom['id_user']; ?></td>
              <td><?= $kolom['nama']; ?></td>
              <td><?= $kolom['username']; ?></td>
              <td><?= $kolom['dihapus_pada']; ?></td>
              <td>
                <a onclick="return confirm('Yakin akan mengembalikan data ini?')" href="aksi/user.php?aksi=restore&id_user=<?= $kolom['id_user']; ?>"> <i class="fas fa-trash-restore"></i></a>
                &nbsp;
                <a onclick="return confirm('Yakin akan menghapus data ini?')" href="aksi/user.php?aksi=hapus-permanen&id_user=<?= $kolom['id_user']; ?>"> <i class="fas fa-eraser"></i></a>
              </td>
            </tr>
          <?php
          } //Akhir While
          ?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>