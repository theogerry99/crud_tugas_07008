<?php include 'config.php'; ?>
<?php
$id = $_GET['id']; // Ambil ID dari URL

// Ambil data produk berdasarkan ID
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Update data menggunakan prepared statement
    $stmt = $conn->prepare("UPDATE products SET nama_produk=?, harga=?, stok=? WHERE id=?");
    $stmt->bind_param("sdii", $nama_produk, $harga, $stok, $id);
    $stmt->execute();

    // Redirect ke halaman utama
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Edit Produk</h1>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="<?= $product['nama_produk'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" step="0.01" name="harga" class="form-control" value="<?= $product['harga'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" value="<?= $product['stok'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>