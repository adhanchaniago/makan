<?php
session_name("administrator");
session_start();

if (!isset($_SESSION['status'])) {
  // code...
  header("location: login.php");
}

include "koneksi.php";
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Administrator</title>
     <link rel="stylesheet" href="__/css/style.css">
   </head>
   <body>
     <nav>
       <a class="brand" href="index.php">Administrator</a>

       <ul class="menu">
         <li><a href="index.php?id=produk">Produk</a></li>
         <li> <a href="index.php?id=transaksi">Transaksi</a> </li>
         <li> <a href="index.php?id=riwayat">Riwayat</a> </li>
         <li> <a href="index.php?id=user">User</a> </li>
       </ul>

       <a class="logout" href="index.php?id=logout">Logout</a>
     </nav>
