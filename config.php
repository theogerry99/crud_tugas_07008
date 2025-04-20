<?php
$host = 'localhost';    // Server database
$user = 'root';         // Username database (default XAMPP)
$pass = '';             // Password database (kosong untuk XAMPP)
$dbname = 'crud_db';    // Nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>