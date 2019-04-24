<?php
session_name("administrator");
session_start();
include "koneksi.php";

// ambil inputan
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$cek = mysqli_query($konek, $sql);
$data = mysqli_fetch_array($cek);
if (mysqli_num_rows($cek) > 0) {
  // code...
  $_SESSION['status'] = "administrator";
  $_SESSION['username'] = $data['username'];
  $_SESSION['hak'] = $data['hak_akses'];

  header("location: ../index.php");
}
else {
  header("location: ../login.php");
}
 ?>
