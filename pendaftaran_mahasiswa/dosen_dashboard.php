<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2>Dashboard Admin</h2>
    <table border="1" cellpadding="10" cellspacing="0" style="margin: auto;">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Email</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['umur']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><img src="<?php echo $row['foto']; ?>" width="50"></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_mahasiswa.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
