<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword ="";
$dbName = "genato_db";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName );
If (!$conn) {
die("Something went wrong!");
}

?>