<?php
include "pages/header.php";

if (isset($_GET['id'])) {
  // code...
  $page = $_GET['id'];
  switch ($page) {
    case 'produk':
      // code...
      include "pages/produk.php";
      break;

    case 'tambahproduk':
      // code...
      include "pages/tambahproduk.php";
      break;

    case 'transaksi':
      // code...
      include "pages/transaksi.php";
      break;

    case 'riwayat':
      // code
      include "pages/riwayat.php";
      break;

    case 'logout':
      //code
      logout();
      break;

    default:
      // code...
      include "pages/404.html";
      break;
  }
}
else {
?>

    <div class="main">
      <h1>Selamat Datang</h1>
      <h3>Halaman Administrator</h3>
    </div>


<?php
}
include "pages/footer.html";
?>
