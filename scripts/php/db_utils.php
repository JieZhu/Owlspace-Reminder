<?php
function connectToDatabase() {
  //Connects to the database for user registration and login
  $dbhost = 'localhost';
  $dbname = 'oplus';
  $dbuser = 'root';
  $dbpass = 'root';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  mysql_select_db($dbname, $conn);
}

function getAssignments($netid) {
  $result = mysql_query("SELECT * FROM assignments WHERE netid = '" . $netid . "';") or die('Error:'. mysql_error());
  $numRows = mysql_num_rows($result);
  $assignments = array();
  for($i=0; $i<$numRows; $i++) {
    $row = mysql_fetch_assoc($result);
    $row['deadline'] = timeStampToTime($row['deadline']);
    $assignments[] = $row;
  }
  return $assignments;
}

function timeStampToTime($timestamp) {
  date_default_timezone_set('America/Mexico_City'); 
  return date('F j, Y, g:i a', $timestamp);
}

function addUser($netid, $pass) {
  $salt = randomSalt(5);
  $saltedHashedPass = hash('sha256', hash('sha256', $pass) . $salt);
  mysql_query("INSERT IGNORE INTO users (netid, password, salt) VALUES 
    ('". $netid . "', '" . $saltedHashedPass . "', '" . $salt . "');") or die('Error:'. mysql_error());
}

function randomSalt($length) {
    // creates a $length digit salt.  helper function.
    $randomstring = '';
    while ($length>13) {
        $string = md5(uniqid(rand(), true));
        $randomstring = $randomstring . $string;
        $length = $length-13;
    }
    $string = md5(uniqid(rand(), true));
    $randomstring = $randomstring.substr($string, 0, $length);
    return $randomstring;
}
?>