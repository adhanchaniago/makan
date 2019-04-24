

  <div class="produk">
    <div class="tambahProduk">
      <h1>Tambah Produk</h1>

      <form class="tamProduk" enctype="multipart/form-data" method="post">
        <div class="namaproduk">
          <label for="namaproduk">Nama Produk :</label>
          <input type="text" name="namaproduk" value="">
        </div>
        <div class="hargaproduk">
          <label for="hargaproduk">Harga Produk :</label>
          <span class="rp">Rp.</span><input type="text" name="hargaproduk" value="">
        </div>
        <div class="deskripsiproduk">
          <p>Deskripsi Produk :</p>
          <textarea name="deskripsiproduk"></textarea>
        </div>
        <div class="fotoproduk">
          <label for="fotoproduk">Foto Produk :</label>
          <input type="file" name="fotoproduk">
        </div>

        <input class="btn-tambahP" type="submit" name="tambah" value="Tambah">
      </form>
    </div>
  </div>

<?php
if (isset($_POST['tambah'])) {
  // ambil inputan
  $nama = $_POST['namaproduk'];
  $harga = $_POST['hargaproduk'];
  $deskripsi = $_POST['deskripsiproduk'];

  $foto = $_FILES['fotoproduk'];
  $nmfoto = $foto['name'];
  $tmpfoto = $foto['tmp_name'];
  $typefoto = $foto['type'];
  $x = explode('.', $nmfoto);
  $ekstensi = strtolower(end($x));
  $dir = "./../dist/makan/";

  if ($ekstensi == "jpg" || $ekstensi == "png") {
    // code...
    $sql = "INSERT INTO produk(nama_produk, harga_produk, deskripsi_produk, foto_produk) VALUES('$nama', '$harga', '$deskripsi', '$nmfoto')";
    if ($foto['size'] <= 1500000) {
      if (!file_exists($dir.$nmfoto)) {
        // code...
        move_uploaded_file($tmpfoto, $dir.$nmfoto);
        mysqli_query($konek, $sql);
        header("location: index.php?id=produk");
      }
      else {
        // code...
        echo "<script>alert('File Sudah Ada !')</script>";
      }

    }
    else {
      echo "<script>alert('Ukuran Foto Terlalu Besar !')</script>";
    }
  }
  else {
    echo "<script>alert('Jenis File Tidak Diizinkan !'); </script>";
  }
}
 ?>
