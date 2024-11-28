<?php
require "koneksi.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM tbkasir_19042 WHERE idkasir = '$id'");
    $data = mysqli_fetch_array($query);
}

if (isset($_POST['update'])) {
    $namakasir = $_POST['namakasir'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];

    $query = mysqli_query($con, "UPDATE tbkasir_19042 SET namakasir = '$namakasir', alamat = '$alamat', notelp = '$notelp' WHERE idkasir = '$id'");

    if ($query) {
        header("Location: index.php");
    }
}
?>

<form method="POST" action="">
    namakasir: <input type="text" name="namakasir" value="<?php echo $data['namakasir']; ?>"><br>
    alamat: <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"><br>
    notelp: <input type="text" name="notelp" value="<?php echo $data['notelp']; ?>"><br>
    <button type="submit" name="update">Update</button>
</form>