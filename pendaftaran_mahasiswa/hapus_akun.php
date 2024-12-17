<?php
session_start();
include 'db.php';

// Pastikan mahasiswa sudah login
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id']; // Ambil ID dari URL

// Cek apakah ID yang dikirim adalah ID yang sama dengan yang login
if ($id != $_SESSION['id']) {
    header('Location: dashboard.php');
    exit;
}

// Hapus data mahasiswa dari tabel mahasiswa
$sql = "DELETE FROM mahasiswa WHERE id = '$id'";

if ($conn->query($sql)) {
    // Hapus sesi dan kembalikan ke halaman utama
    session_destroy();
    header('Location: index.php');
    exit;
} else {
    echo "Gagal menghapus akun: " . $conn->error;
}
?>
