<?php
$host = "localhost";
$user = "username";                     
$pass = "password";                                  
$db = "database_name";
$port = 3306;

$con = mysqli_connect($host, $user, $pass, $db, $port) 
    or die(mysqli_connect_error());
?>