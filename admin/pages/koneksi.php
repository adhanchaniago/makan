<?php
$host = "localhost";
$user = "root";
$passwd = "";
$db = "makan";

$konek = mysqli_connect($host, $user, $passwd, $db);
if (!$konek) {
  echo "Gagal koneksi !";
}

//fungsi logout
function logout(){
  session_start();
  session_destroy();
  header("location: login.php");
}
?>
