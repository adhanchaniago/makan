<?php
$sql = "SELECT user.nama_user, pembayaran.* FROM user, pembayaran WHERE user.id_user=pembayaran.id_user AND pembayaran.status_pesan='Selesai'";
$ambil = mysqli_query($konek, $sql);
 ?>

  <div class="riwayat">
    <h1>Riwayat Transaksi</h1>

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
        <th>Status</th>
      </tr>
      <?php
      $no = 1;
      while ($data = mysqli_fetch_array($ambil)) {
        // code...
      ?>
      <tr>
        <td><?= $no; ?>.</td>
        <td><?= $data['nama_user']; ?></td>
        <td>MY<?= $data['id_pembayaran']; ?></td>
        <td><?= $data['total_pesan']; ?></td>
        <td>Rp. <?= number_format($data['total_bayar'], 0, ',', '.'); ?></td>
        <td><?= $data['metode_bayar']; ?></td>
        <td><?= $data['alamat']; ?></td>
        <td><?= $data['kode_pos']; ?></td>
        <td><?= $data['status_pesan']; ?></td>
      </tr>
      <?php
      $no++;
      }
       ?>
    </table>
  </div>
