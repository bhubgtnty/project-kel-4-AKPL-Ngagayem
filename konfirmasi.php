<?php
include 'config/koneksi.php';

// Periksa apakah user login
if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
    echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

// Ambil ID pembelian dari parameter URL
$id_pembelian = $_GET['id'];

// Ambil data pembelian untuk validasi
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$id_pembelian'");
$data_pembelian = $ambil->fetch_assoc();

// Validasi: pastikan pembelian milik pelanggan yang sedang login
if ($data_pembelian['id_pelanggan'] != $_SESSION['pelanggan']['id_pelanggan']) {
    echo "<script>alert('Akses ditolak!');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}

// Update status pembelian menjadi "completed"
$koneksi->query("UPDATE pembelian SET status_pembelian='completed' WHERE id_pembelian='$id_pembelian'");

echo "<script>alert('Pesanan telah dikonfirmasi!');</script>";
echo "<script>location='riwayat.php';</script>";
?>
