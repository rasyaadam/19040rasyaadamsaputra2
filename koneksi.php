<?php
$host = "localhost";
$username = "root";
$pass = "";
$db = "19040_psas";
$con=mysqli_connect($host, $username, $pass, $db);
if (!$con) {
    die("koneksi gagal".mysqli_connect_error());
}