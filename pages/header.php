<?php
session_name("user");
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Makan Yuk!</title>
    <link rel="stylesheet" href="dist/css/style.css">
  </head>
  <body>

    <nav>
      <div class="menu-atas">
        <a class="brand" href="index.php">Makan<b>Yuk!</b></a>
        <ul>
          <li> <a href="#">Menu Atas</a> </li>
          <li> <a href="#">Menu Atas 2</a> </li>
          <li> <a href="#">Menu Atas 3</a> </li>
        </ul>
      </div>
      <div class="menu">
        <ul>
          <?php
          if (isset($_SESSION['id'])) {
            // code...
            echo "<li> <a href='status.php'>Status</a> </li>";
          }
          ?>
          <li class="cart">
            <a href="index.php?id=cart">Cart</a>
            <div class="cart-konten">
              <?php
                if (isset($_SESSION['id'])) {
                  $idUser = $_SESSION['id'];
                  $cekCart = mysqli_query($konek, "select * from keranjang where id_user='$idUser' and keranjang.bayar!=1");
                  $jmlCart = mysqli_num_rows($cekCart);
                  echo "<p>Keranjang : ".$jmlCart."</p>";
                }
                else {
                  echo "<p>Silahkan Login</p>";
                }
               ?>
            </div>
          </li>
          <li class="dropdown">
             <?php
               if (isset($_SESSION['status'])) {
                 // code...
                 echo "<a href='#'>";
                 echo $_SESSION['nama'];
                 echo "</a>";
                 echo "

                 <div class='dropdown-isi'>
                   <a class='logout' href='pages/logout.php'>Logout</a>
                 </div>

                 ";
               }
               else {
                 echo "<a href='index.php?id=login'>Login</a>";
               }
              ?>

          </li>
        </ul>
      </div>
    </nav>
