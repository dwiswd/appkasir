<?php 
$penjualanid=$_GET['penjualanid'];
$sql1="SELECT penjualan.*,pelanggan.namapelanggan FROM penjualan,pelanggan WHERE penjualan.pelangganid=pelanggan.pelangganid AND penjualan.penjualanid=$penjualanid";
$query1=mysqli_query($koneksi,$sql1);
$penjualan=mysqli_fetch_array($query1);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Informasi Detail Penjualan </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Penjualan</a></li>
            <li class="breadcrumb-item active"><a href="index.php?p=histori"></a>Histori Penjualan</li>
            <li class="breadcrumb-item active">Informasi Penjualan</li>
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
          <h5>informasi Penjualan</h5>
        </div>
        <div class="card-body">
    <div class="row">
        <div class="col-md-3">
            No Transaksi
        </div>
        <div class="col-md-3">
            : <?= $penjualan['penjualanid']; ?>
        </div>
        <div class="col-md-3">
            Tanggal Transaksi
        </div>
        <div class="col-md-3">
            : <?= $penjualan['tanggalpenjualan']; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
           Nama Pelanggan
        </div>
        <div class="col-md-3">
            : <?= $penjualan['namapelanggan']; ?>
        </div>
        <div class="col-md-3">
            Total belanja
        </div>
        <div class="col-md-3">
            : Rp.<?= number_format( $penjualan['totalharga']); ?>
        </div>
    </div>
          <!--data belanja -->
          <table class="table">
            <thead>
                <th>No</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </thead>
            <?php 
            $no=0;
            $total_item=0;
            $total_belanja=0;
            $sql2="SELECT detailpenjualan.*,produk.namaproduk,produk.barcode FROM detailpenjualan,produk WHERE detailpenjualan.produkid=produk.produkid AND detailpenjualan.penjualanid=$penjualanid";
            $query2=mysqli_query($koneksi,$sql2);
            while($data=mysqli_fetch_array($query2)){
                $no++;
                $subtotal=$data['jumlahproduk']*$data['harga'];
                $total_item=$total_item+$data['jumlahproduk'];
                $total_belanja=$total_belanja+$subtotal;
                echo "
                <tr>
                <td>$no</td>
                <td>$data[namaproduk]</td>
                <td>".number_format($data['harga'])."</td>
                <td>$data[jumlahproduk]</td>
                <td>".number_format($subtotal)."</td>
                </tr>
                ";
            }
            ?>
          </table>
          
         
        </div>
      </div>
    </div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

