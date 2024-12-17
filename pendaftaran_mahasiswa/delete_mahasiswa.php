<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'];
$sql = "DELETE FROM mahasiswa WHERE id = $id";

if ($conn->query($sql)) {
    header('Location: dosen_dashboard.php');
    exit;
} else {
    echo "Gagal menghapus: " . $conn->error;
}
?>
