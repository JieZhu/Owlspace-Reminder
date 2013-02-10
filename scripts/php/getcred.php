<?php
  $password = $argv[1];
  $userKey = $argv[2];
  include_once('./vault.php');

  $key = $userKey . $serverKey;

  $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($password), MCRYPT_MODE_CBC, md5(md5($key))), "\0");

  return $decrypted;
?>