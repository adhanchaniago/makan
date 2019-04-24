<?php
if (!isset($_SESSION['status'])) {
  header("location: index.php");
}

//ambil data keranjang
//$id = isset($_SESSION['id']);
$query = "SELECT * FROM produk, keranjang WHERE id_user='$idUser' AND keranjang.id_produk=produk.id_produk AND keranjang.bayar!=1";
$ambil = mysqli_query($konek, $query);
 ?>

 <div class="keranjang">

<?php
if (mysqli_num_rows($ambil) == 0) {
  // code...
  echo "Keranjang Kosong !";
}
 ?>

   <table>
     <tr>
       <th>#</th>
       <th>Menu</th>
       <th>Harga</th>
       <th>Jumlah</th>
       <th>Sub Total</th>
       <th>#</th>
     </tr>
     <?php
      $no = 1;
      $total = 0;
      while ($data = mysqli_fetch_array($ambil)) {
     ?>
     <tr>
       <td><?php echo $no; ?></td>
       <td><a href="detail.php?id=<?php echo $data['id_produk']; ?>"><?php echo $data['nama_produk']; ?></a></td>
       <td>Rp. <?php echo number_format($data['harga_produk'], 0, ',', '.'); ?></td>
       <td><?php echo $data['jumlah']; ?></td>
       <td>Rp. <?php echo number_format($data['sub_total'], 0, ',', '.'); ?></td>
       <td> <a href="pages/dcart.php?id=<?php echo $data['id_keranjang']; ?>">Hapus</a> </td>
     </tr>
     <?php
      $total += $data['sub_total'];
      $no++;
      }
      ?>
     <tr>
       <th colspan="4">Total</th>
       <th>Rp. <?php echo number_format($total, 0, ',', '.'); ?></th>
       <td> <a href="index.php?id=bayar">Bayar</a> </td>
     </tr>
   </table>

 </div>
