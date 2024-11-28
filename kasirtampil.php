
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Toko</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            background-color: #f8f9fa;
            font-family: 'Times New Roman', sans-serif;
        }
        
        /* Header Styling */
        header {
            background-color: #90EE90;
            color: black;
            padding: 15px;
            text-align: center;
        }
        
        /* Sidebar Styling */
        .sidebar {
            background-color: #3CB371;
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
            color: #2c3e50;
        }
        
        /* Footer Styling */
        footer {
            background-color: #2c3e50;
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
    <header>
        <h1>SELAMAT DATANG</h1>
    </header>

    <!-- Sidebar -->
    <nav class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="beranda.php"><i class="fas fa-home"></i> Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="barangtampil.php"><i class="fas fa-box"></i> Data Barang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="datakasir.php"><i class="fas fa-user"></i> Data Kasir</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-exchange-alt"></i> Transaksi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-file-alt"></i> Laporan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="content">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Data Barang</h1>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
            <th>Satuan</th>
            <th>Stok Barang</th>
            <th>OPSI</th>
        </tr>
        </thead>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </table>

    <?php
   
    ?>
    </main>

    <!-- Footer -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
