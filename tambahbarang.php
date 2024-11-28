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
        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nama_siswa = input($_POST["nama_siswa"]);
            $nis = input($_POST["nis"]);
            $alamat = input($_POST["alamat"]);
            $keterangan = input($_POST["keterangan"]);

            //Query input menginput data kedalam tabel anggota
            $sql = "insert into data_siswa (nama_siswa,nis,alamat,keterangan) values
		('$nama_siswa','$nis','$alamat','$keterangan')";

            //Mengeksekusi/menjalankan query diatas
            $hasil = mysqli_query($con, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:index.php?a=index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
        ?>
        <h2>Input Data</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <div class="form-group">
            <label>nama siswa:</label>
            <input type="text" name="nama_siswa" class="form-control" placeholder="Masukan nama siswa" required />

        </div>
        <div class="form-group">
            <label>nis:</label>
            <input type="text" name="nis" class="form-control" placeholder="Masukan nis" required />
        </div>
        <div class="form-group">
            <label>alamat :</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukan alamat" required />
        </div>
        </p>
        <div class="form-group">
            <label for="keterangan">keterangan</label>
            <select class="form-control" id="user-role" name="keterangan">
                <option value="hadir">hadir</option>
                <option value="alpha">alpha</option>
                <option value="sakit">sakit</option>
            </select>
        </div>


        <button type="submit" name="submit" class="btn btn-dark">Submit</button>
    </form>
    </div>
</body>

</html>