<?php
include 'koneksi.php';

$idPmbyrn = $_GET['id'];
$sql = "UPDATE pembayaran SET status_pesan='Menunggu Pengiriman' WHERE pembayaran.id_pembayaran='$idPmbyrn'";
if (mysqli_query($konek, $sql)) {
  // code...
  $pesan = "Transaksi Menunggu Pengiriman !";
  header("location: ../index.php?id=transaksi&status=$pesan");
}
 ?>
