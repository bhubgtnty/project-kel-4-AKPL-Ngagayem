<?php
include 'config/koneksi.php';

// Ambil data produk yang akan dibeli dari request
$produk = $_POST['produk']; // Asumsikan `produk` adalah array ID produk dan jumlah pembelian

$response = [
    'status' => 'success',
    'message' => 'Stok mencukupi',
];

foreach ($produk as $id_produk => $jumlah_beli) {
    // Ambil data stok dari database
    $result = $koneksi->query("SELECT stok_produk FROM produk WHERE id_produk = $id_produk");
    $data = $result->fetch_assoc();

    if ($data['stok_produk'] < $jumlah_beli) {
        $response = [
            'status' => 'error',
            'message' => "Stok produk ID $id_produk tidak mencukupi.",
        ];
        echo json_encode($response);
        exit;
    }
}

echo json_encode($response);
?>
