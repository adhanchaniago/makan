<?php
if (isset($_SESSION['status'])) {
  // code...
  header("location: index.php");
}

 ?>

    <div class="register">
      <form action="pages/pdaftar.php" onSubmit="return cekRegister()"  method="post">
        <div class="txtRegister">
          <h1>Register</h1>
        </div>
        <div class="fieldRegister">
          <div>
            <label for="username">Nama Lengkap :</label><br>
            <input type="text" name="namalengkap" id="namalengkap" value="" placeholder="Nama Lengkap">
          </div>
          <div>
            <label for="username">Username :</label><br>
            <input type="text" name="username" id="username" value="" placeholder="Username">
          </div>
          <div>
            <label for="username">Email :</label><br>
            <input type="email" name="email" id="email" value="" placeholder="Masukkan Email">
          </div>
          <div>
            <label for="username">Password :</label><br>
            <input type="password" name="password" id="password" value="" placeholder="Masukkan Password">
          </div>
          <div>
            <label for="username">Ulangi Password :</label><br>
            <input type="password" name="repassword" id="repassword" value="" placeholder="Masukkan Password">
          </div>
          <div>
            <label for="username">No. HP :</label><br>
            <input type="tel" pattern="\d*" name="notelp" id="notelp" placeholder="Masukkan No. Hp">
          </div>
        </div>
        <input class="btn-login" type="submit" name="daftar" value="Daftar">
        Sudah Punya Akun? <a href="index.php?id=login">Login</a>
      </form>
    </div>
