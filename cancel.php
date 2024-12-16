<?php
include 'config/koneksi.php';

// Mendapatkan ID pembelian dari parameter URL
$id_pembelian = $_GET['id'];

// Validasi: Periksa apakah ID pembelian valid dan milik pelanggan yang sedang login
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$id_pembelian' AND id_pelanggan='{$_SESSION['pelanggan']['id_pelanggan']}'");
$pembelian = $ambil->fetch_assoc();

if (empty($pembelian)) {
    echo "<script>alert('Pembelian tidak ditemukan!');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}

// Ambil detail produk yang dipesan untuk mengembalikan stok
$ambilDetail = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$id_pembelian'");
while ($detail = $ambilDetail->fetch_assoc()) {
    $id_produk = $detail['id_produk'];
    $jumlah = $detail['jumlah'];

    // Kembalikan stok produk
    $koneksi->query("UPDATE produk SET stok_produk = stok_produk + $jumlah WHERE id_produk = '$id_produk'");
}

// Hapus data dari tabel pembelian_produk
$koneksi->query("DELETE FROM pembelian_produk WHERE id_pembelian='$id_pembelian'");

// Hapus data dari tabel pembelian
$koneksi->query("DELETE FROM pembelian WHERE id_pembelian='$id_pembelian'");

echo "<script>alert('Pesanan berhasil dibatalkan dan stok telah dikembalikan.');</script>";
echo "<script>location='riwayat.php';</script>";
?>
