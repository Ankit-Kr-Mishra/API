<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generate Key</title>
</head>
<body>
 <script>
     function generate(){
    document.write('<?php
                   require_once 'header.php';
                   echo "Hello ".$username."<br>Your public API key : ";
                   $salt1 = time();
                   $hash_key_public = hash('ripemd128', "$salt1$username");
                   queryMysql("update members set apikey='$hash_key_public' where username='$username'");
                   $hash_key_private = hash('ripemd128', "$username$salt1");
                   queryMysql("update members set privatekey='$hash_key_private' where username='$username'");
                   echo $hash_key_public;
                   echo "<br><br>Your private API key : ".$hash_key_private."<br>Never share this with anyone";?>');
     }
</script>
    <button onclick="generate()">Generate new api key</button>
</body>
</html>