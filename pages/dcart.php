<?php
session_name("user");
session_start();
include "koneksi.php";

//cek Login
if (!isset($_SESSION['status'])) {
  echo "Anda harus login!";
}

//ambil id keranjang
$id = $_GET['id'];

//hapus data
$query = "delete from keranjang where id_keranjang='$id'";
if (mysqli_query($konek, $query)) {
  header("location: ../index.php?id=cart");
}
else {
  echo "Gagal !";
}
