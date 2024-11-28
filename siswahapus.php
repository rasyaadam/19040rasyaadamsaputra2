<?php
require "koneksi.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($con, "DELETE FROM data_siswa WHERE id_siswa = '$id'");
    
    if ($query) {
        header("Location: index.php");
    }
}
?>