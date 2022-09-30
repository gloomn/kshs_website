<?php

$serverName = "localhost";
$dbUsername = "kwtest";
$dbPassword = "thswjdals1!";
$dbName = "kwtest";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}