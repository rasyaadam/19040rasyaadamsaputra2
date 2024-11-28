<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    require "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $namakasir=input($_POST["namakasir"]);
        $alamat=input($_POST["alamat"]);
        $notelp=input($_POST["notelp"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into tbkasir_19042 (namakasir,alamat,notelp) values
		('$namakasir','$alamat','$notelp')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($con ,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php?a=datakasir");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Kasir</label>
            <input type="text" name="namakasir" class="form-control" placeholder="Masukan Nama Kasir" required />

        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required/>
        </div>
       <div class="form-group">
            <label>Notelp</label>
            <input type="text" name="notelp" class="form-control" placeholder="Masukan Nomor Telephone" required/>
        </div>
        

        <button type="submit" name="submit" class="btn btn-dark">Submit</button>
    </form>
</div>
</body>
</html>