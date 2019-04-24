<?php
include "koneksi.php";

// ambil inputan user
$nama = $_POST['namalengkap'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$notelp = $_POST['notelp'];

if (!empty($nama) && !empty($username) && !empty($email) && !empty($password) && !empty($repassword) && !empty($notelp)) {
  // code...
  if ($repassword != $password) {
    // code...
    $error = "Password tidak sama !";
    header("location: ../index.php?id=register");
  }
  else {
    // code...
    $query = "INSERT INTO user(nama_user, username, email_user, passwd_user, nohp_user) VALUES('$nama', '$username', '$email', '$password', '$notelp')";
    $daftar = mysqli_query($konek, $query);
    if ($daftar) {
      // code...
      header("location: ../index.php?id=login");
    }
    else {
      // code...
      header("location: ../index.php?id=register");
    }
  }
}
else {
  // code...
  header("location: ../index.php?id=register");
}
 ?>
