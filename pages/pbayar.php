<?php
session_name("user");
session_start();
include "koneksi.php";

if (!isset($_SESSION['status'])) {
  header("location: ../index.php");
}

//ambil inputan
$idUser = $_SESSION['id'];
$totalpesan = $_POST['totalpesan'];
$totalbayar = $_POST['totalbayar'];
$pembayaran = $_POST['pembayaran'];
$alamat = $_POST['alamat'];
$kodepos = $_POST['kodepos'];
$status = "Menunggu Pembayaran";
$tanggal = date("Y-m-d");

// data di db
$queryCek = "SELECT * FROM `pembayaran` WHERE id_user='$idUser' AND alamat='$alamat' AND kode_pos='$kodepos' AND total_pesan='$totalpesan' AND total_bayar='$totalbayar' AND metode_bayar='$pembayaran' AND status_bayar='$status' AND tanggal_bayar='$tanggal'";
$cek = mysqli_query($konek, $queryCek);
if (mysqli_num_rows($cek) > 0) {
  $pesan = "Data Sudah Ada";
  header("location: ../index.php?id=bayar&error=$pesan");
}
else {
  // code...
  //input data ke db
  $query = "INSERT INTO pembayaran(id_user, alamat, kode_pos, total_pesan, total_bayar, metode_bayar, status_pesan, tanggal_bayar) VALUES('$idUser', '$alamat', '$kodepos', '$totalpesan', '$totalbayar', '$pembayaran', '$status', '$tanggal')";
  if (mysqli_query($konek, $query)) {
    // update status bayar
    $queryUpBayar = "UPDATE keranjang SET bayar=1 WHERE keranjang.id_user='$idUser'";
    mysqli_query($konek, $queryUpBayar);

    header("location: ../status.php");
  }
}
