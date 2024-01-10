<?php 
session_start();
include "../koneksi.php";
include "../function.php";

if($_POST){
    if($_POST['aksi']=='tambah'){
        $namaproduk=$_POST['namaproduk'];
        $harga=$_POST['harga'];
        $stok=$_POST['stok'];
        
        $sql="INSERT INTO produk (produkid,namaproduk,harga,stok) VALUE (DEFAULT,'$namaproduk','$harga','$stok')";
        //echo $sql;//Cek Perintah
        mysqli_query($koneksi,$sql);
        notifikasi($koneksi);

        header('location:../index.php?p=produk');
    }

    else if($_POST['aksi']=='ubah'){
        $produkid=$_POST['produkid'];
        $namaproduk=$_POST['namaproduk'];
        $harga=$_POST['harga'];
        $stok=$_POST['stok'];
        

        $sql="UPDATE produk SET namaproduk='$namaproduk',harga='$harga', stok='$stok' WHERE produkid=$produkid";
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
            $_SESSION['namaproduk']=$produk['namaproduk'];
            $_SESSION['produkid']=$produk['produkid'];
            $_SESSION['menu']="MANAJEMEN";
            $_SESSION['status_proses']='';

            header("location:../index.php");
        } else {
            header("location:../login.php?msg=err");
        }
    }
}

if($_GET){

    if($_GET['aksi']=='hapus'){
        $produkid=$_GET['produkid'];
        $sql="DELETE FROM produk WHERE produkid=$produkid"; 

        mysqli_query($koneksi,$sql);
        header('location:../index.php?p=produk');

    }
}
