<?php
session_start();
include 'koneksi.php';

if (isset($_SESSION['status'])) {
  // code...
  $id = $_GET['id'];
  $sql = "DELETE FROM produk WHERE id_produk='$id'";
  if (mysqli_query($konek, $sql)) {
    // code...
    header("location: ../index.php?id=produk");
  }
}
else {
  echo "404 Not Found";
}

?>
