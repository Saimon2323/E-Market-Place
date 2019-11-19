<?php
/* Database connection settings */

$host = "localhost";
$user = "root";
$pass = "";
$db = "e-market_place";

$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);

?>