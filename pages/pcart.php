<?php
session_name("user");
session_start();
include "koneksi.php";

//ambil data produk
$user = $_SESSION['id'];
$produk = $_GET['id'];
$jumlah = $_POST['jumlah'];
$total = $_POST['totalharga'];
$date = date("Y-m-d");

//cek Login
if (!isset($_SESSION['status'])) {
  echo "Anda harus login!";
  $pesan = "Anda Harus Login";
  header("location: ../detail.php?id=$produk&error=$pesan");
}

//cek keranjang
$cekData = "select * from keranjang where id_produk='$produk' and jumlah='$jumlah' and id_user='$user' and bayar!=1";
$cek = mysqli_query($konek, $cekData);
if (mysqli_num_rows($cek) == 0) {
  //insert ke keranjang
  $masukCart = "insert into keranjang(id_user, id_produk, jumlah, sub_total, bayar, tanggal_pesan) values('$user', '$produk', '$jumlah', '$total', '0', '$date')";
  if(mysqli_query($konek, $masukCart)){
    header("location: ../index.php?id=cart");
  }
  else {
    echo "Gagal !";
  }
}
else {
  // code...
  $pesan = "Data Sudah Ada";
  header("location: ../detail.php?id=$produk&error=$pesan");
}

 ?>
