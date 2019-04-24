<?php
session_start();

if (isset($_SESSION['status'])) {
  // code...
  header("location: index.php");
}

include "pages/koneksi.php";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="__/css/style.css">
  </head>
  <body>
    <div class="login">
      <form action="pages/plogin.php" method="POST">
        <h1>Administrator</h1>
        <div>
          <input type="text" name="username" placeholder="Username" autofocus><br>
          <input type="password" name="password" placeholder="Password"><br>
        </div>

        <input class="btn-login" type="submit" value="Login">
      </form>
    </div>
  </body>
</html>
