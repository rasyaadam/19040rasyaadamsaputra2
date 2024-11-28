<?php
require "koneksi.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($con, "DELETE FROM tbkasir_19042 WHERE idkasir = '$id'");
    
    if ($query) {
        header("Location: index.php");
    }
}
?>