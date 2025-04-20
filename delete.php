<?php include 'config.php'; ?>
<?php
$id = $_GET['id']; // Ambil ID dari URL

// Hapus data menggunakan prepared statement
$stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

// Redirect ke halaman utama
header("Location: index.php");
exit();
?>