<?php
  require_once 'functions.php';

  if (isset($_POST['username']))
  {
    $username   = sanitizeString($_POST['username']);
    $result = queryMysql("SELECT * FROM members WHERE username='$username'");

    if ($result->num_rows)
      echo  "<span class='unavailable'>&nbsp;&#x2718; " .
            "unavailable</span>";
    else
      echo "<span class='available'>&nbsp;&#x2714; " .
           "available</span>";
  }
?>