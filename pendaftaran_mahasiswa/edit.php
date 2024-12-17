<?php
session_start();
include 'db.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $email = $_POST['email'];

    // Update data
    $sql = "UPDATE mahasiswa SET nama = '$nama', umur = $umur, email = '$email' WHERE id = $id";
    if ($conn->query($sql)) {
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Gagal memperbarui data: " . $conn->error;
    }
}

$sql = "SELECT * FROM mahasiswa WHERE id = $id";
$user = $conn->query($sql)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js" defer></script>
</head>
<body>
    <h2>Edit Data Pribadi</h2>
    <form method="POST">
        <label>Nama Lengkap:</label>
        <input type="text" name="nama" value="<?php echo $user['nama']; ?>" required><br>
        <label>Umur:</label>
        <input type="number" name="umur" value="<?php echo $user['umur']; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
