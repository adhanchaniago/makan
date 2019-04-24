<?php
$sql = "SELECT user.nama_user, user.nohp_user, pembayaran.* FROM user, pembayaran WHERE user.id_user=pembayaran.id_user AND pembayaran.status_pesan!='Selesai'";
$ambil = mysqli_query($konek, $sql);
 ?>

  <div class="transaksi">
    <h1>Transaksi Pengguna</h1>
    <?php if (isset($_GET['status'])){
      $pesan = $_GET['status'];
      echo "<h4 style='color: red;'>$pesan</h4>";
    } ?>

    <table>
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>ID Psn</th>
        <th>Qty</th>
        <th>Qty Bayar</th>
        <th>Bank</th>
        <th>Alamat</th>
        <th>Kode Pos</th>
        <th>No. HP</th>
        <th>Status</th>
        <th>#</th>
      </tr>
      <?php
      $no = 1;
      while ($data = mysqli_fetch_array($ambil)) {
        // code...
       ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $data['nama_user']; ?></td>
        <td>MY<?= $data['id_pembayaran']; ?></td>
        <td><?= $data['total_pesan']; ?></td>
        <td>Rp. <?= number_format($data['total_bayar'], 0, ',', '.'); ?></td>
        <td><?= $data['metode_bayar']; ?></td>
        <td><?= $data['alamat']; ?></td>
        <td><?= $data['kode_pos']; ?></td>
        <td><?= $data['nohp_user']; ?></td>
        <td><?= $data['status_pesan']; ?></td>
        <td>
          <?php
          $idPmbyrn = $data['id_pembayaran'];
            if ($data['status_pesan'] == "Menunggu Pembayaran") {
              echo "<a href='pages/trankirim.php?id=$idPmbyrn'>Kirim</a>";
            }
            if ($data['status_pesan'] == "Menunggu Pengiriman") {
              echo "<a href='pages/transelesai.php?id=$idPmbyrn'>Selesai</a>";
            }
          ?>
        </td>
      </tr>
      <?php
      $no++;
      }
       ?>
    </table>
  </div>
