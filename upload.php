<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload</title>
</head>
<body>
 <?php
  if (isset($_FILES['image']['name']))
  {
    $saveto = "Ankit.jpg";
    move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
      //echo $_FILES['image']['type'];
     // echo $_FILES['image']['tmp_name'];
  }
  echo <<<_END
    <form method='post' action='upload.php' enctype='multipart/form-data'>
    <h3>upload an image</h3>
_END;
?>

    Image: <input type='file' name='image' size='14'>
    <input type='submit' value='upload image'>
    <a href='text.php'><br>print json</a>
    </form></div><br>
  </body>
</html>