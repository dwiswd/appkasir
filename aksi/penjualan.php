<?php 
session_start();
include "../koneksi.php";
include "../function.php";

if($_POST){
    if($_POST['aksi']=='tambah-keranjang-bybarcode'){
        $id_user=$_SESSION['id'];
        $barcode=$_POST['barcode'];
        $jumlah=$_POST['jumlah'];

        //temukan Produk Berdasarkan Barcode
        $sql1="SELECT * FROM produk WHERE barcode='$barcode'";
        $query1=mysqli_query($koneksi,$sql1);
        $produk=mysqli_fetch_array($query1);

        if(mysqli_num_rows($query1)>=1){
            //echo "Produk Ditemukan Di database";
            $produkid=$produk['produkid'];
            //Cek Keranjang Bila Produk Sudah ada Hanya Meng-update Jumlah,Bila belum ada akan insert data
            $sql3="SELECT * FROM keranjang WHERE produkid=$produkid AND id_user=$id_user";
            $query3=mysqli_query($koneksi,$sql3);
            $duplikat=mysqli_num_rows($query3);

            if($duplikat==0){
                $sql2="INSERT INTO keranjang(keranjangid,produkid,jumlah,id_user) VALUES(DEFAULT,$produkid,$jumlah,$id_user)";
            } else {
                $sql2="UPDATE keranjang SET jumlah=jumlah+$jumlah WHERE produkid=$produkid AND id_user=$id_user";
            }
            
            mysqli_query($koneksi,$sql2);
            header('location:../index.php?p=tambah');
        } else {
            //echo "Produk Tidak Ditemukan Di Database";
            header('location:../index.php?p=tambah&err=produk_tidak_ditemukan');
        }

     }
     else if($_POST['aksi']=='tambah-keranjang-bynama'){
        $produkid=$_POST['produkid'];
        $jumlah=$_POST['jumlah'];
        $id_user=$_SESSION['id'];
        $sql3="SELECT * FROM keranjang WHERE produkid=$produkid AND id_user=$id_user";
            $query3=mysqli_query($koneksi,$sql3);
            $duplikat=mysqli_num_rows($query3);

            if($duplikat==0){
                $sql2="INSERT INTO keranjang(keranjangid,produkid,jumlah,id_user) VALUES(DEFAULT,$produkid,$jumlah,$id_user)";
            } else {
                $sql2="UPDATE keranjang SET jumlah=jumlah+$jumlah WHERE produkid=$produkid AND id_user=$id_user";
            }
            
            mysqli_query($koneksi,$sql2);
            notifikasi($koneksi);
            header('location:../index.php?p=tambah');
     }
     else if ($_POST['aksi']=='simpan-penjualan'){
        $id_user=$_SESSION['id'];
        $pelangganid=$_POST['pelangganid'];
        $tanggalpenjualan=$_POST['tanggalpenjualan'];
        $totalharga=$_POST['totalharga'];

        $sql1="INSERT INTO penjualan(penjualanid,tanggalpenjualan,totalharga,pelangganid) values(default,'$tanggalpenjualan',$totalharga,$pelangganid)";
        //echo $sql1;
        if(mysqli_query($koneksi,$sql1)){
            echo "Simpan Penjualan sukses";
        }

     }
}

    else if($_POST['aksi']=='ubah'){
        $produkid=$_POST['produkid'];
        $barcode=$_POST['barcode'];
        $namaproduk=$_POST['namaproduk'];
        $harga=$_POST['harga'];
        $stok=$_POST['stok'];
        

        $sql="UPDATE produk SET barcode='$barcode', namaproduk='$namaproduk',harga='$harga', stok='$stok' WHERE produkid=$produkid";
        //echo $sql;//Cek Perintah
        mysqli_query($koneksi,$sql);

        header('location:../index.php?p=produk');

    }
    else if($_POST['aksi']=='login'){
        $harga=$_POST['harga'];
        $stok=$_POST['stok'];

        $sql="SELECT * FROM produk WHERE namaproduk='$namaproduk' AND stok='$stok'";
        $query=mysqli_query($koneksi,$sql);
        $ketemu=mysqli_num_rows($query);
        if($ketemu>=1){
            $produk=mysqli_fetch_array($query);
            $_SESSION['harga']=$produk['harga'];
            $_SESSION['barcode']=$produk['barcode'];
            $_SESSION['namaproduk']=$produk['namaproduk'];
            $_SESSION['produkid']=$produk['produkid'];
            $_SESSION['menu']="MANAJEMEN";
            $_SESSION['status_proses']='';

            header("location:../index.php");
        } else {
            header("location:../login.php?msg=err");
        }
    }


if($_GET){

    if($_GET['aksi']=='hapus-keranjang'){
        $produkid=$_GET['produkid'];
        $id_user=$_SESSION['id'];
        $sql="DELETE FROM keranjang WHERE produkid=$produkid AND id_user=$id_user"; 

        mysqli_query($koneksi,$sql);
        notifikasi($koneksi);
        header('location:../index.php?p=tambah');

    }
}
