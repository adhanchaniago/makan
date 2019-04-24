<?php
include "pages/header.php";

$id = $_GET['id'];
$query = "select * from produk where id_produk='$id'";
$ambilProduk = mysqli_query($konek, $query);
$data = mysqli_fetch_array($ambilProduk);
 ?>

    <div class="detail">
      <div class="detKiri" align="center">
        <img src="dist/makan/<?php echo $data['foto_produk']; ?>" class="img-responsive img-detail" alt="">
      </div>
      <div class="detKanan">
      <form class="" action="pages/pcart.php?id=<?php echo $id; ?>" method="POST">
        <h1><?php echo $data['nama_produk']; ?></h1>
        <p><?php echo $data['deskripsi_produk'] ?></p>

        <div class="harga">
          <table>
            <tr>
              <th>Harga</th> <th>:</th>
              <td>Rp.</td>
              <td id="harga"><?php echo $data['harga_produk']; ?></td>
            </tr>
            <tr>
              <th>Total harga</th> <th>:</th>
              <td>Rp. </td>
              <td id="totHarga" name="totalharga"><?php echo $data['harga_produk']; ?></td>
            </tr>
          </table>
        </div>

        <label for="jumlah">Jumlah :</label> <br>
        <input class="jml" onchange="totalHarga()" id="jml" type="number" min="1" max="100" name="jumlah" value="1">
        <input type="hidden" name="totalharga" id="totHargaHidden" value="<?php echo $data['harga_produk']; ?>">
        <input class="btn-beli" type="submit" value="Beli">
      </form>
      <?php
        if (isset($_GET['error'])) {
          echo "<h2 class='error'>" .$_GET['error']. "</h2>";
        }
      ?>
      </div>
    </div>


<?php include "pages/footer.html"; ?>
