<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
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
            background-color: #808080;
            font-family: 'Times New Roman', sans-serif;
        }

        /* Header Styling */
        header {
            background-color: #808080;
            color: black;
            padding: 15px;
            text-align: center;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #808080;
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
            background-color: #a9a9a9;
            color: white;
        }

        /* Content Styling */
        .content {
            margin-left: 250px;
            /* Matches the width of the sidebar */
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
            background-color: #808080;
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
    <header class="position-relative text-white">
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
        <h2>@AdamPutra</h2>
        <p>Selamat datang di sistem presensi siswa. Silakan pilih menu di sebelah kiri untuk melanjutkan.</p>
    </main>

    <!-- Footer -->
    <footer>
        &copy; RasyaAdamss
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>