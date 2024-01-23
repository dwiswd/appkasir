<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Histori</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Penjualan</a></li>
            <li class="breadcrumb-item active">Histori</li>
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
          <h5>Data Penjualan</h5>
        </div>
        <div class="card-body">
          
          <table id="example1" class="table table-hover">
            <thead class="bg-purple">
              <th>Id</th>
              <th>Tanggal penjualan</th>
              <th>Pelanggan</th>
              <th>Total Belanja</th>
        
              <th>Aksi</th>
            </thead>
            <?php
            $sql = "SELECT penjualan.*,pelanggan.namapelanggan FROM penjualan,pelanggan WHERE penjualan. pelangganid=pelanggan.pelangganid";
            $query = mysqli_query($koneksi, $sql);
            while ($kolom = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?= $kolom['penjualanid']; ?></td>
                <td><?= $kolom['tanggalpenjualan']; ?></td>
                <td><?= $kolom['namapelanggan']; ?></td>
                <td><?=number_format($kolom['totalharga']); ?></td>
                
                <td>
                  <!-- Tombol Print Nota   -->
                  <a href="#"><i class="fas fa-print"></i></a>
                  <!--tombol Informasi -->
                  <a href="index.php?p=infojual&penjualanid= <?= $kolom['penjualanid']; ?>"><i class="fas fa-search"></i></a>
                  <!-- Tombol Hapus -->
                  <a href="aksi/penjualan.php?aksi=hapus&penjualanid=<?= $kolom['penjualanid']; ?>" onclick="return confirm ('Yakin Akan Hapus Data Ini???')"><i class="fas fa-trash"></i></a>
                  
          
                </td>
              </tr>
              <!--Modal Ubah produk-->
              <div class="modal fade" id="modalUbah<?= $kolom['produkid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah produk</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="aksi/produk.php" method="post">
                        <input type="hidden" name="aksi" value="ubah">
                        <input type="hidden" name="produkid" value="<?= $kolom['produkid']; ?>">

                        <label for="barcode">Barcode</label>
                        <input type="text" name="barcode" value="<?= $kolom['barcode']; ?>" class="form-control" require>
                        <br>

                        <label for="namaproduk">Nama Produk</label>
                        <input type="text" name="namaproduk" value="<?= $kolom['namaproduk']; ?>" class="form-control" require>
                        <br>
                        <label for="harga">harga</label>
                        <input type="number" name="harga" value="<?= $kolom['harga']; ?>" class="form-control" require>
                        <br>
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" value="<?= $kolom['stok']; ?>" class="form-control" require>
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
          <button type="button" class="btn bg-purple btn-block mt-3" data-toggle="modal" data-target="#modalTambah"> <i class="fas fa-plus">Tambah produk Baru </i></button>
        </div>
      </div>
    </div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--Modal Tambah produk-->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="aksi/produk.php" method="post">
          <input type="hidden" name="aksi" value="tambah" name="produkid">

          <label for="barcode">Barcode</label>
          <input type="text" name="barcode" class="form-control" require>
          <br>

          <label for="namaproduk">Nama Produk</label>
          <input type="text" name="namaproduk" class="form-control" require>
          <br>
          <label for="harga">Harga</label>
          <input type="number" name="harga" class="form-control" require>
          <br>
          <label for="stok">Stok</label>
          <input type="number" name="stok" class="form-control" require>
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

