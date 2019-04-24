
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Gambar</title>
  </head>
  <body>
    <h1>Upload File dengan PHP</h1>

    <form enctype="multipart/form-data" method="post">
      <input type="file" name="foto"> <br>
      <input type="submit" name="upload" value="Upload">
    </form>

    <div>
      <img src="file/zedbot.jpg" style="width: 200px; height: 200px;" alt="">
    </div>
  </body>
</html>

<?php
if (isset($_POST['upload'])) {
  // code...
  $dir = "file/";
  $foto = $_FILES['foto'];
  $nmfoto = $foto['name'];
  $tmpfoto = $foto['tmp_name'];

  move_uploaded_file($tmpfoto, $dir.$nmfoto);
}
echo $nmfoto;
 ?>
