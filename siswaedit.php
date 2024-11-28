<?php
require "koneksi.php";

$id = ""; // Inisialisasi $id
$data = []; // Inisialisasi $data

// Cek apakah ID dikirim melalui GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hindari SQL Injection
    $id = mysqli_real_escape_string($con, $id);

    // Ambil data siswa berdasarkan ID
    $query = mysqli_query($con, "SELECT * FROM data_siswa WHERE id_siswa = '$id'");

    if ($query && mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
    } else {
        echo "<div class='alert alert-danger text-center'>Data tidak ditemukan!</div>";
        exit;
    }
}

// Proses update data siswa
if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($con, $_POST['namasiswa']);
    $nis = mysqli_real_escape_string($con, $_POST['nis']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
    $keterangan = mysqli_real_escape_string($con, $_POST['keterangan']);

    // Query update data siswa
    $query = mysqli_query($con, "UPDATE data_siswa 
                                 SET nama_siswa = '$nama', nis = '$nis', alamat = '$alamat', keterangan = '$keterangan' 
                                 WHERE id_siswa = '$id'");

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "<div class='alert alert-danger text-center'>Data gagal diupdate!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
            margin-bottom: 20px;
            text-align: center;
        }
        button {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Data Siswa</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="namasiswa">Nama Siswa:</label>
            <input type="text" id="namasiswa" name="namasiswa" class="form-control" 
                value="<?php echo isset($data['nama_siswa']) ? $data['nama_siswa'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="nis">NIS:</label>
            <input type="text" id="nis" name="nis" class="form-control" 
                value="<?php echo isset($data['nis']) ? $data['nis'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" class="form-control" 
                value="<?php echo isset($data['alamat']) ? $data['alamat'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <textarea id="keterangan" name="keterangan" class="form-control" rows="3" required><?php echo isset($data['keterangan']) ? $data['keterangan'] : ''; ?></textarea>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
