<?php
//cek status login
if (isset($_SESSION['status'])) {
  header("location: index.php");
}
 ?>

    <div class="login">
      <form action="pages/plogin.php" onsubmit="return cekLogin()" method="post">
        <div class="txtLogin">
          <h1>Login</h1>
          <p>Silahkan login</p>
        </div>
        <div class="fieldLogin">
          <input type="email" name="email" id="email" placeholder="Email" autofocus><br>
          <input type="password" name="password" id="password" placeholder="Password"><br>
        </div>
        <input class="btn-login" type="submit" name="" value="Login">
        <a href="index.php?id=register">Daftar?</a>
      </form>
      <p><?php if (isset($_GET['error'])) {
        echo $_GET['error'];
      } ?></p>
    </div>
