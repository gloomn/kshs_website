<?php

$serverName = "localhost";
$dbUsername = "";
$dbPassword = "";
$dbName = "";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
