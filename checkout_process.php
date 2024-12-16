<?php
include 'config/koneksi.php';
include 'midtrans.php'; // Include the Midtrans configuration

$totalbelanja = 0;

// Ambil data dari form
$totalbelanja = (int)$_POST['total_pembelian'];
$ongkir = $_POST['ongkir'];
$id_pelanggan = $_POST["id_pelanggan"];
$total_pembelian = (int)$totalbelanja + (int)$ongkir; // Ambil total_pembelian dari form
$order_id = time(); // Generate a unique order ID
$alamat_pengiriman = $_POST['alamat_pengiriman'];    
$totalberat = $_POST['total_berat'];
$provinsi = $_POST['provinsi'];
$distrik = $_POST['distrik'];
$tipe = $_POST['tipe'];
$kodepos = $_POST['kodepos'];
$ekspedisi = $_POST['ekspedisi'];
$paket = $_POST['paket'];
$estimasi = $_POST['estimasi'];
$tanggal_pembelian = date('Y-m-d');
$total_product = $_POST["total_belanja"];
$total_bayar = $ongkir + $total_product;

foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    $pecah = $ambil->fetch_assoc();
    $subharga = (int)$pecah['harga_produk'] * (int)$jumlah;
    $totalbelanja += $subharga; // Menambahkan subharga ke total belanja
}

// Menyimpan data ke tabel pembelian
mysqli_query($koneksi,"INSERT INTO pembelian(id_pelanggan, tanggal_pembelian, total_pembelian, alamat_pengiriman, totalberat, provinsi, distrik, tipe, kodepos, ekspedisi, paket, ongkir, estimasi) VALUES('$id_pelanggan', '$tanggal_pembelian', '$total_bayar', '$alamat_pengiriman', '$totalberat', '$provinsi', '$distrik', '$tipe', '$kodepos', '$ekspedisi', '$paket', '$ongkir', '$estimasi')");

// Mendapatkan id_pembelian yang baru terjadi
$id_pemebelian_barusan = $koneksi->insert_id;

foreach($_SESSION["keranjang"] as $id_produk => $jumlah){

  // Mendapatkan data produk berdasarkan id_produk
  $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
  $perproduk = $ambil->fetch_assoc();
  
  $nama = $perproduk['nama_produk'];
  $harga = $perproduk['harga_produk'];
  $berat = $perproduk['berat_produk'];
  $subberat = $perproduk['berat_produk']*$jumlah;
  $subharga = $perproduk['harga_produk']*$jumlah;

  $koneksi->query("INSERT INTO pembelian_produk(id_pembelian, id_produk, nama, harga, berat, subberat, subharga, jumlah) VALUES('$id_pemebelian_barusan', '$id_produk', '$nama', '$harga', '$berat', '$subberat', '$subharga', '$jumlah')");

  // Update stok
  $koneksi->query("UPDATE produk SET stok_produk=stok_produk - $jumlah WHERE id_produk='$id_produk'");
}

// Buat detail transaksi
$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' => $total_pembelian, // Total amount
);

// Buat item details (optional)
$item_details = array();
foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    $pecah = $ambil->fetch_assoc();
    $item_details[] = array(
        'id' => $pecah['id_produk'],
        'price' => $pecah['harga_produk'],
        'quantity' => $jumlah,
        'name' => $pecah['nama_produk'],
    );
}

$item_details[] = array(
    'id' => 'ongkir',
    'price' => $ongkir,
    'quantity' => 1,
    'name' => 'Biaya Ongkir',
);


// Buat customer details (optional)
$customer_details = array(
    'first_name' => $_SESSION['pelanggan']['nama_pelanggan'],
    'last_name' => '',
    'email' => $_SESSION['pelanggan']['email_pelanggan'],
    'phone' => $_SESSION['pelanggan']['telepon_pelanggan'],
    "id_pembelian" => $id_pemebelian_barusan,
);

// Buat transaksi
$transaction = array(
    'transaction_details' => $transaction_details,
    'item_details' => $item_details,
    'customer_details' => $customer_details,
);

// Dapatkan Snap Token
try {
    unset($_SESSION["keranjang"]);

    // Ambil snap token
    $snap_token = Midtrans\Snap::getSnapToken($transaction);

    // Asumsikan $id_pembelian adalah ID pembelian yang baru saja di-insert ke dalam database
    // Pastikan Anda sudah mendapatkan id_pembelian sebelumnya
    echo json_encode([
        'snap_token' => $snap_token,
        'id_pembelian' => $id_pemebelian_barusan // Menambahkan id_pembelian ke dalam response
    ]);
} catch (Exception $e) {
    // Jika terjadi error, tampilkan error message
    echo json_encode(['error' => $e->getMessage()]);
}