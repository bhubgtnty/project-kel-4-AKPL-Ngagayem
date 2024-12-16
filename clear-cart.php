<?php
session_start();

// Pastikan keranjang ada sebelum menghapusnya
if (isset($_SESSION["keranjang"])) {
    unset($_SESSION["keranjang"]);
    echo json_encode(['status' => 'success', 'message' => 'Keranjang berhasil dihapus']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Keranjang tidak ditemukan']);
}
?>
