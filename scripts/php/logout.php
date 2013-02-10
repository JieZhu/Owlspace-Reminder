<?php
  session_start();
  unset($_SESSION['netid']);
  header('Location: ../../index.php');
?>