<?php

$host = 'db562012370.db.1and1.com';
$dbname = 'db562012370';
$user = 'dbo562012370';
$pass = 'draGon#5';

/*
try {
  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
 }
catch(PDOException $e) {
    echo $e->getMessage();
}*/

mysql_connect("$host", "$user", "$pass");

mysql_select_db("$dbname");
?>
