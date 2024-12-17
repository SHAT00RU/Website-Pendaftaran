<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $email = $_POST['email'];

    // Upload foto
    $fotoName = $_FILES['foto']['name'];
    $fotoTmp = $_FILES['foto']['tmp_name'];
    $fotoPath = "uploads/" . basename($fotoName);
    move_uploaded_file($fotoTmp, $fotoPath);

    // Simpan data
    $sql = "INSERT INTO mahasiswa (username, password, nama, umur, email, foto) 
            VALUES ('$username', '$password', '$nama', $umur, '$email', '$fotoPath')";
    if ($conn->query($sql)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Pendaftaran gagal: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js" defer></script>
</head>
<body>
    <h2>Form Pendaftaran</h2>
    <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <label>Nama Lengkap:</label>
        <input type="text" name="nama" required>
        <label>Umur:</label>
        <input type="number" name="umur" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Foto Identitas:</label>
        <input type="file" name="foto" accept="image/*" required>
        <button type="submit">Daftar</button>
    </form>
    <a href="index.php">Back</a>
</body>
</html>
