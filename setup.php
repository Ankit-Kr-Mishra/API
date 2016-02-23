<!DOCTYPE html>
<html>
  <head>
    <title>Setting up database</title>
  </head>
  <body>

    <h3>Setting up...</h3>

<?php
  require_once 'functions.php';

  createTable('members',
              'username VARCHAR(16),
              password VARCHAR(32),
              email VARCHAR(64),
              birthday VARCHAR(64),
              apikey VARCHAR(32),
              question TINYINT,
              answer VARCHAR(32),
              INDEX(username(6))');
 createTable('info',
              'url VARCHAR(256),
              text VARCHAR(4096)');      
      
      
?>

    <br>...done.
  </body>
</html>
