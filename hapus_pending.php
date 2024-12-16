<?php
include 'config/koneksi.php';

// Waktu sekarang
$sekarang = date("Y-m-d H:i:s");

// Ambil semua pesanan yang pending dan lebih dari 24 jam
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE status_pembelian = 'pending' AND TIMESTAMPDIFF(HOUR, tanggal_pembelian, '$sekarang') > 24");

while ($pembelian = $ambil->fetch_assoc()) {
    $id_pembelian = $pembelian['id_pembelian'];

    // Ambil detail pembelian untuk mengembalikan stok produk
    $detail = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian _produk= '$id_pembelian'");
    while ($produk = $detail->fetch_assoc()) {
        $id_produk = $produk['id_produk'];
        $jumlah = $produk['jumlah'];

        // Update stok produk
        $koneksi->query("UPDATE produk SET stok = stok + $jumlah WHERE id_produk = '$id_produk'");
    }

    // Hapus detail pembelian
    $koneksi->query("DELETE FROM pembelian_produk WHERE id_pembelian_produk = '$id_pembelian'");

    // Hapus pembelian
    $koneksi->query("DELETE FROM pembelian WHERE id_pembelian = '$id_pembelian'");
}

echo "Order pending lebih dari 24 jam telah dihapus.";
?>
