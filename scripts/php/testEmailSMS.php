<?php
  session_start();
  if(isset($_SESSION['netid'])) {
    $command = 'C:/python27/python ../../scripts/python/send_all_stuffs.py ' . $_SESSION['netid'];
    exec($command);
  }
?>