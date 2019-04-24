<?php
include "pages/header.php";

if (isset($_GET['id'])) {
  // code...
  $page = $_GET['id'];
  switch ($page) {
    case 'login':
      // code...
      include "pages/login.php";
      break;

    case 'register':
      // code...
      include "pages/register.php";
      break;

    case 'cart':
      // code...
      include "pages/cart.php";
      break;

    case 'bayar':
      // code...
      include "pages/bayar.php";
      break;

    default:
      // code...
      header("location: 404.php");
      break;
  }
}
else {
  // code...
 ?>

 <div class="main">
   <div class="isiMain">
     <h1>Laper?</h1>
     <h2>Pesan aja disini !</h2>
   </div>
 </div>

<!-- <div class="promo">
   <div class="mainPromo">
     <div class="kiri">
       <img src="dist/makan/bakso.jpg" style="width: 300px; height: 250px;" class="img-responsive" alt="">
     </div>
     <div class="kanan">
       <h1>Menu Minggu Ini !</h1>
       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
       <h3><s>Rp. 15.000</s></h3>
     </div>
   </div>
 </div> -->

 <div class="pilihMenu">

   <?php
    $query = "select * from produk";
    $ambilProduk = mysqli_query($konek, $query);

    while ($data = mysqli_fetch_array($ambilProduk)) {
      // code...
    ?>

   <div class="card">
     <div class="card-body">
       <img src="dist/makan/<?php echo $data['foto_produk']; ?>" class="img-responsive img-produk" alt="">
     </div>
     <div class="card-footer">
       <h4><?php echo $data['nama_produk']; ?></h4>
       <p>Rp. <?php echo number_format($data['harga_produk'], 0, ',', '.'); ?></p>
       <a href="detail.php?id=<?php echo $data['id_produk']; ?>" class="btn-beli">Detail</a>
     </div>
   </div>
   <?php
    }
    ?>

 </div>

<?php }?>

<?php include "pages/footer.html"; ?>
