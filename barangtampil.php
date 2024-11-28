<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Toko</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <style>
        /* General Styles */
        body {
            background-color: #f9f9f9;
            font-family: 'Times New Roman', sans-serif;
        }
        
        /* Header Styling */
        header {
            background-color: #6c757d;
            color: white;
            padding: 15px;
            text-align: center;
        }
        
        /* Sidebar Styling */
        .sidebar {
            background-color: #6c757d;
            min-height: 100vh;
            padding-top: 20px;
            position: fixed;
            width: 250px;
            top: 0;
            left: 0;
            z-index: 100;
        }

        .sidebar .nav-link {
            color: #ecf0f1;
            padding: 15px;
            font-size: 16px;
            transition: background 0.3s;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .sidebar .nav-link:hover {
            background-color: #1abc9c;
            color: white;
        }
        
        /* Content Styling */
        .content {
            margin-left: 250px; /* Matches the width of the sidebar */
            padding: 40px;
            background-color: white;
            min-height: 100vh;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .content h2 {
            font-size: 2rem;
            color: #6c757d;
        }
        
        /* Footer Styling */
        footer {
            background-color: #6c757d;
            color: white;
            padding: 15px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: calc(100% - 250px);
            margin-left: 250px;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
                min-height: auto;
            }

            .content {
                margin-left: 0;
                margin-top: 20px;
            }

            footer {
                width: 100%;
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="position-relative">
        <h1>SELAMAT DATANG</h1>
    </header>

    <!-- Sidebar -->
    <nav class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="beranda.php"><i class="fas fa-home"></i> Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="barangtampil.php"><i class="fas fa-box"></i> Data Siswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="content">
        <h2>Presensi Siswa</h2>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="tambahbarang.php" class="btn btn-primary">Tambah Siswa</a>
            <form action="" method="post" class="d-flex">
                <input type="text" placeholder="Cari Siswa" class="form-control me-2" name="pencarian">
                <input type="submit" class="btn btn-primary" value="Cari" name="btncari">
            </form>
        </div>
        <table class="table table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>NIS</th>
                    <th>Alamat</th>
                    <th>Keterangan</th>
                    <th>OPSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require "koneksi.php";
                if (empty($_POST['pencarian'])) {
                    $sql = mysqli_query($con, "SELECT * FROM data_siswa ORDER BY id_siswa DESC");
                } else if (isset($_POST['btncari']) && $_POST['pencarian'] != "") {
                    $pencarian = $_POST['pencarian'];
                    $sql = mysqli_query($con, "SELECT * FROM data_siswa WHERE nama_siswa LIKE '%".$pencarian."%' ORDER BY id_siswa DESC");
                }
                
                $no = 1;
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_siswa']; ?></td>
                        <td><?php echo $data['nis']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['keterangan']; ?></td>
                        <td>
                            <a href="siswaedit.php?id=<?php echo $data['id_siswa']; ?>" class="btn btn-warning">Edit</a>
                            <a href="siswahapus.php?id=<?php echo $data['id_siswa']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </main>

    <!-- Footer -->
    <footer>
        &copy; RasyaAdamss
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-qQ2iX+K5t5D5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r5Z5r