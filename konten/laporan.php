<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item active">Laporan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

                <p>Laporan Produk</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="pdf/output/laporan_produk.php" target="_blank" class="small-box-footer">Cetak <i class="fas fa-print"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                

                <p>Laporan Pelanggan</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill"></i>
              </div>
              <a href="pdf/output/laporan_pelanggan.php" target="_blank" class="small-box-footer">Cetak <i class="fas fa-print"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                
                <p>Laporan Penjualan</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill"></i>
              </div>
              <a href="#" data-toggle="modal" data-target="#modalPenjualan" class="small-box-footer">Cetak <i class="fas fa-print"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                
                <p>Laporan Penjualan Per-Produk</p>
              </div>
              <div class="icon">
                <i class="fas fa-exclamation-triangle"></i>
              </div>
              <a href="pdf/output/laporan_penjualan_per-produk.php" data-toggle="modal" data-target="#modalPenjualanPerProduk" class="small-box-footer">Cetak <i class="fas fa-print"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!--Modal Laporan penjualan-->
<div class="modal fade" id="modalPenjualan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Periode laporan Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="pdf/output/laporan_penjualan.php" method="get" target="_blank">
         
          <label for="tanggal_awal">Tanggal awal</label>
          <input type="date" name="tanggal_awal" class="form-control" require>
          <br>
          <label for="tanggal_akhir">Tanggal Akhir</label>
          <input type="date" name="tanggal_akhir" class="form-control" require>
          <br>

          <button type="submit" class="btn btn-block bg-purple"> <i class="fas fa-Print">Cetak</i></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 
  <!--Modal Laporan penjualan-->
<div class="modal fade" id="modalPenjualanPerProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Periode laporan Penjualan Per-Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="pdf/output/laporan_penjualan_per-produk.php" method="get" target="_blank">
         <label for="produkid">Produk</label>
         <select name="produkid" class="form-control" require>
            <option value="">--Pilih Produk--</option>
            <?php 
            $sql="SELECT * FROM produk ORDER BY namaproduk";
            $query=mysqli_query($koneksi,$sql);
            while($data=mysqli_fetch_array($query)){
              echo "<option value='$data[produkid]'>$data[namaproduk]</option>";
            }
            ?>
         </select>
          <label for="tanggal_awal">Tanggal awal</label>
          <input type="date" name="tanggal_awal" class="form-control" require>
          <br>
          <label for="tanggal_akhir">Tanggal Akhir</label>
          <input type="date" name="tanggal_akhir" class="form-control" require>
          <br>

          <button type="submit" class="btn btn-block bg-purple"> <i class="fas fa-Print">Cetak</i></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 