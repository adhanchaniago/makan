<?php
include "pages/header.php";

if (!isset($_SESSION['id'])) {
  header("location: index.php");
}
 ?>

 <div class="status">
   <h1>Status Pemesanan</h1>

   <table>
     <tr>
       <th>#</th>
       <th>ID Pesan</th>
       <th>Pesanan</th>
       <th>Total Bayar</th>
       <th>Bank</th>
       <th>Alamat</th>
       <th>Kode Pos</th>
       <th>Status</th>
     </tr>
     <?php
      $no = 1;
      $query = "SELECT * FROM pembayaran WHERE id_user='$idUser' ORDER BY status_pesan ASC";
      $ambilPembayaran = mysqli_query($konek, $query);
      while ($data = mysqli_fetch_array($ambilPembayaran)) {
      ?>
     <tr>
       <td><?php echo $no; ?>.</td>
       <td>MY<?php echo $data['id_pembayaran']; ?></td>
       <td><?php echo $data['total_pesan']; ?></td>
       <td>Rp. <?php echo number_format($data['total_bayar'], 0, ',', '.'); ?></td>
       <td><?php echo $data['metode_bayar']; ?></td>
       <td><?php echo $data['alamat']; ?></td>
       <td><?php echo $data['kode_pos']; ?></td>
       <td><?php echo $data['status_pesan']; ?></td>
     </tr>
     <?php
      $no++;
      }
      ?>

   </table>

   <div class="pesanPembayaran">
     <marquee class="error">Silahkan Lakukan Pembayaran !</marquee>
     <p>Daftar No. Rek :</p>
     <ol>
       <li>BRI - 123456789</li>
       <li>BNI - 456789123</li>
       <li>MANDIRI - 678912345</li>
     </ol>
   </div>

 </div>



<?php
include "pages/footer.html";
 ?>
