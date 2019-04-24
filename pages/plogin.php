<?php
session_name("user");
session_start();
include "koneksi.php";

$email = $_POST['email'];
$password = $_POST['password'];

$query = "select * from user where email_user='$email' and passwd_user='$password'";
$ceklogin = mysqli_query($konek, $query);
$cekuser = mysqli_num_rows($ceklogin);
$datauser = mysqli_fetch_array($ceklogin);

if ($cekuser > 0) {
  // code...
  //echo $datauser['username'];
  $_SESSION['id'] = $datauser['id_user'];
  $_SESSION['status'] = "login";
  $_SESSION['username'] = $datauser['username'];
  $_SESSION['nama'] = $datauser['nama_user'];

  header("location: ../index.php");
}
else {
  // code...
  $error = "Email atau Password salah !";
  header("location: ../index.php?id=login&error=$error");
}
 ?>
