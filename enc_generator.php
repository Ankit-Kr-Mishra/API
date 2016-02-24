<?php
  $private_api_key = 'paste your private api key here';
  $url = 'paste the global url of the image here';
  echo hash('ripemd128', "".$private_api_key.$url);
?>
