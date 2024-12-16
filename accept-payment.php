<?php
include 'config/koneksi.php';

// Ambil id_pelanggan dari session
$id_pembelian = $_POST["id_pembelian"];

// Tentukan status baru yang ingin di-update
$status_baru = 'Lunas'; // Contoh status baru, sesuaikan dengan kebutuhan Anda
echo($id_pembelian);
// Query untuk mengupdate status_pembelian
$query = "UPDATE pembelian SET status_pembelian = '$status_baru' WHERE id_pembelian = '$id_pembelian'";


mysqli_query($koneksi, $query);