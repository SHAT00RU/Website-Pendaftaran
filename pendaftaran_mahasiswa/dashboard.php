<?php
session_start();
include 'db.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

$id = $_SESSION['id'];
$sql = "SELECT * FROM mahasiswa WHERE id = $id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js" defer></script>
</head>
<body>
    <h2>Data Pribadi Anda</h2>
    <p>Nama: <?php echo $user['nama']; ?></p>
    <p>Umur: <?php echo $user['umur']; ?></p>
    <p>Email: <?php echo $user['email']; ?></p>
    <p><img src="<?php echo $user['foto']; ?>" width="150"></p>

    <a href="edit.php">Edit Data</a> |
    <a href="logout.php">Logout</a> |
    <a href="hapus_akun.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini? Semua data akan hilang!')">Hapus Akun</a>
</body>
</html>
