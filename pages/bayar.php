<?php

//ambil data keranjang
$query = "SELECT produk.nama_produk, keranjang.sub_total, keranjang.jumlah FROM produk, keranjang WHERE keranjang.id_user='$idUser' AND keranjang.id_produk=produk.id_produk";
$ambil = mysqli_query($konek, $query);

 ?>

  <div class="bayar">
    <form onSubmit="return bayar()" action="pages/pbayar.php" method="POST">
      <h1>Pembayaran</h1>
      <h4 class="error"><?php if (isset($_GET['error'])) {
        echo $_GET['error'];
        echo ", silahkan menuju halaman ";
        echo "<a href='status.php'>status</a>";
      } ?></h4>

      <div class="detPesanan">
        <label for="pesanan">Pesanan :</label>
        <ol>
          <?php
          $totalPesan = 0;
          $totalBayar = 0;
          while ($data = mysqli_fetch_array($ambil)) {
          ?>
          <li><?php echo $data['nama_produk']; ?> -> <?php echo $data['jumlah']; ?></li>
          <?php
          $totalPesan += $data['jumlah'];
          $totalBayar += $data['sub_total'];
          }
           ?>
        </ol>
      </div>

      <div class="detTotalPesan">
        <label for="totalpesan">Total Pesan :</label>
        <p><?php echo $totalPesan; ?></p>
        <input type="hidden" name="totalpesan" value="<?php echo $totalPesan; ?>" readonly>
      </div>

      <div class="detTotalbayar">
        <label for="totalbayar">Total Bayar :</label>
        <p>Rp. <?php echo number_format($totalBayar, 0, ',', '.'); ?></p>
        <input type="hidden" name="totalbayar" value="<?php echo $totalBayar; ?>">
      </div>

      <div class="detPembayaran">
        <label for="pembayaran">Pembayaran :</label>
        <select onchange="pBank()" id="pilihBank" name="pembayaran">
          <option value="pilihbank">Pilih Bank</option>
          <option value="BRI">BRI</option>
          <option value="BNI">BNI</option>
          <option value="Mandiri">Mandiri</option>
        </select>
        <p id="norek"></p>
      </div>

      <div class="detAlamat">
        <label for="alamat">Alamat :</label>
        <textarea id="alamat" name="alamat"></textarea>
      </div>

      <div class="detKodePos">
        <label for="kodepos">Kode Pos :</label>
        <input id="kodepos" type="text" name="kodepos">
      </div>

      <input type="submit" class="btn-bayar" value="Bayar">


    </form>
  </div>
