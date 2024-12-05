<?php

$user = 'root';
$clave = '';
$host = 'localhost';
$db = 'usuarios';    
$mysqli = new mysqli($host,$user,$clave,$db);
    
// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?> 