<?php
$host = "127.0.0.1";
$user = "luke";
$password = "luke";
$db = "cs420_project";
$connection = new mysqli($host,$user,$password,$db);
if ($connection->connect_errno) {
    die("Failed to connect to MySQL: ($mysqli->connect_errno) $mysqli->connect_error");
}
?>