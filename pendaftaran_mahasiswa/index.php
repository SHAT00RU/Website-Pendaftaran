<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js" defer></script>
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
    </nav>
    <div class="container">
        <h1>Selamat Datang di Sistem Pendaftaran Mahasiswa</h1>
        <div style="text-align: center; margin-top: 20px;">
            <a href="login.php"><button>Login</button></a>
            <a href="register.php"><button>Daftar</button></a>
        </div>
    </div>
    <footer>
        &copy; <?php echo date("Y"); ?> Sistem Pendaftaran Mahasiswa
    </footer>
</body>
</html>
