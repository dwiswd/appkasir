<?php 
session_start();
include "../koneksi.php";
include "../function.php";

if($_POST){
    if($_POST['aksi']=='tambah'){
        $namapelanggan=$_POST['namapelanggan'];
        $alamat=$_POST['alamat'];
        $nomortelepon=$_POST['nomortelepon'];
        
        $sql="INSERT INTO pelanggan (pelangganid,namapelanggan,alamat,nomortelepon) VALUE (DEFAULT,'$namapelanggan','$alamat','$nomortelepon')";
        //echo $sql;//Cek Perintah
        mysqli_query($koneksi,$sql);
        notifikasi($koneksi);

        header('location:../index.php?p=pelanggan');
    }

    else if($_POST['aksi']=='ubah'){
        $pelangganid=$_POST['pelangganid'];
        $namapelanggan=$_POST['namapelanggan'];
        $alamat=$_POST['alamat'];
        $nomortelepon=$_POST['nomortelepon'];
        

        $sql="UPDATE pelanggan SET namapelanggan='$namapelanggan',alamat='$alamat', nomortelepon='$nomortelepon' WHERE pelangganid=$pelangganid";
        //echo $sql;//Cek Perintah
        mysqli_query($koneksi,$sql);

        header('location:../index.php?p=pelanggan');

    }
    else if($_POST['aksi']=='login'){
        $alamat=$_POST['alamat'];
        $nomortelepon=$_POST['nomortelepon'];

        $sql="SELECT * FROM pelanggan WHERE namapelanggan='$namapelanggan' AND nomortelepon='$nomortelepon'";
        $query=mysqli_query($koneksi,$sql);
        $ketemu=mysqli_num_rows($query);
        if($ketemu>=1){
            $pelanggan=mysqli_fetch_array($query);
            $_SESSION['alamat']=$pelanggan['alamat'];
            $_SESSION['namapelanggan']=$pelanggan['namapelanggan'];
            $_SESSION['pelangganid']=$pelanggan['pelangganid'];
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
        $pelangganid=$_GET['pelangganid'];
        $sql="DELETE FROM pelanggan WHERE pelangganid=$pelangganid"; 

        mysqli_query($koneksi,$sql);
        header('location:../index.php?p=pelanggan');

    }
}
