<?php 

if (empty($_GET['p'])){
  $title= "Sistem Informasi Biaya Pendidikan";
  $konten="konten/home.php";
}
else if($_GET['p']=='user'){
  $title= "Data User";
  $konten="konten/user.php";
}
else if($_GET['p']=='produk'){
  $title= "Data produk";
  $konten="konten/produk.php";
}
else if($_GET['p']=='pelanggan'){
  $title= "Data pelanggan";
  $konten="konten/pelanggan.php";
}
//Menu Untuk Transaksi

else if($_GET['p']=='laporan'){
  $title= "laporan Sistem";
  $konten="konten/laporan.php";
}
else if($_GET['p']=='backup'){
  $title= "Backup Sistem";
  $konten="konten/backup.php";
}
else if($_GET['p']=='restore'){
  $title= "Restore Sistem";
  $konten="konten/restore.php";
}

//Akhir Menu Transaksi

//Menu Untuk Siswa
else if($_GET['p']=='input-bayar'){
  $title= "Input Laporan Bayar";
  $konten="konten/siswa-input-bayar.php";
}
else if($_GET['p']=='riwayat'){
  $title= "Riwayat Pembayaran Siswa";
  $konten="konten/siswa-riwayat.php";
}
else if($_GET['p']=='siswa-laporan'){
  $title= "Riwayat Pembayaran Siswa";
  $konten="konten/siswa-laporan.php";
}
else if($_GET['p']=='siswa-info'){
  $title= "Data Riwayat Transaksi Siswa";
  $konten="konten/siswa-info.php";
}
else if($_GET['p']=='bayar-alokasi-siswa'){
  $title= "Data Riwayat Transaksi Siswa";
  $konten="konten/bayar-alokasi-siswa.php";
}
//Akhir Menu Untuk Siswa

else{
  $title= "Halaman Tidak Ditemukan";
  $konten="konten/404.php";
}
?>