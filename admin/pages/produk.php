

  <div class="produk">
    <div class="daftarProduk">
      <h1>Daftar Produk</h1>

      <a class="btn-tambah" href="index.php?id=tambahproduk">+ Tambah Produk</a>

      <table>
        <tr>
          <th>#</th>
          <th>Gambar</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Deskripsi</th>
          <th>#</th>
        </tr>
        <?php
        $no = 1;
        $query = "SELECT * FROM produk ORDER BY produk.id_produk DESC";
        $ambilProduk = mysqli_query($konek, $query);
        while ($data = mysqli_fetch_array($ambilProduk)) {
          // code...
         ?>
        <tr>
          <td><?php echo $no; ?>.</td>
          <td><img class="fotoDaftarProduk" src="./../dist/makan/<?php echo $data['foto_produk']; ?>"></td>
          <td><?php echo $data['nama_produk']; ?></td>
          <td>Rp. <?php echo number_format($data['harga_produk'], 0, ',', '.'); ?></td>
          <td><?php echo $data['deskripsi_produk']; ?></td>
          <td> <a class="btn-edit" href="#">Edit</a> <a class="btn-hapus" href="pages/dproduk.php?id=<?= $data['id_produk']; ?>">Hapus</a> </td>
        </tr>
        <?php
        $no++;
      }
         ?>
        <tr>
         <th>#</th>
         <th>Gambar</th>
         <th>Nama Produk</th>
         <th>Harga</th>
         <th>Deskripsi</th>
         <th>#</th>
        </tr>
      </table>
    </div>
  </div>
