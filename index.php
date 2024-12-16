<?php
// Koneksi ke database
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tokoku</title>
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">

  <!-- Tambahkan CSS untuk mengatur ukuran produk -->
  <style>
    .product-card {
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 15px;
      margin-bottom: 20px;
      text-align: center;
      height: 350px; /* Tinggi tetap untuk setiap produk */
    }
    .product-card img {
      width: 100%; /* Gambar memenuhi kontainer */
      max-height: 150px; /* Batasi tinggi maksimum gambar */
      object-fit: cover; /* Memastikan gambar ter-crop dengan baik */
    }
    .product-card .caption h3 {
      font-size: 16px;
      height: 50px; /* Pastikan heading produk konsisten */
      overflow: hidden; /* Sembunyikan teks yang terlalu panjang */
      text-overflow: ellipsis;
    }
    .product-card .caption h5 {
      font-size: 14px;
      margin: 10px 0;
    }
    .product-card .btn {
      margin-top: 10px;
    }
  </style>
</head>
<body>

<?php include 'templates/navbar.php'; ?>

<!-- konten -->
<section class="content">
  <div class="container">
    
    <?php
    // Ambil semua kategori dari tabel kategori
    $kategoriQuery = $koneksi->query("SELECT * FROM kategori");
    while ($kategori = $kategoriQuery->fetch_assoc()):
      $idKategori = $kategori['id_kategori'];
      $namaKategori = $kategori['nama_kategori'];
    ?>
    
    <!-- Heading kategori -->
    <h2><?= $namaKategori; ?></h2>
    <div class="row">
      <?php
      // Ambil produk berdasarkan kategori (menggunakan id_kategori)
      $produkQuery = $koneksi->query("SELECT * FROM produk WHERE stok_produk > 0 AND id_kategori = '$idKategori'");
      if ($produkQuery->num_rows > 0): 
        while ($perproduk = $produkQuery->fetch_assoc()):
      ?>
      <div class="col-md-3">
        <div class="product-card">
          <img src="foto_produk/<?= $perproduk['foto_produk']; ?>" alt="<?= $perproduk['nama_produk']; ?>">
          <div class="caption">
            <h3><?= $perproduk['nama_produk']; ?></h3>
            <h5>Rp. <?= number_format($perproduk['harga_produk']); ?>,-</h5>
            <a href="beli.php?id=<?= $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
            <a href="detail.php?id=<?= $perproduk['id_produk']; ?>" class="btn btn-default">Detail</a>
          </div>
        </div>
      </div>
      <?php 
        endwhile;
      else: 
      ?>
        <p class="text-muted">Tidak ada produk di kategori ini.</p>
      <?php endif; ?>
    </div>
    
    <?php endwhile; ?>
  </div>
</section>
  
</body>
</html>
