<?php
include 'config/koneksi.php';
//koneksi ke database

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])){
  echo "<script>alert('Keranjang kosong, silahkan pilih produk!');</script>";
  echo "<script>location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang Belanja</title>
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'templates/navbar.php'; ?>

<section class="content">
  <div class="container">
    <h1>Keranjang Belanja</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subharga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $total_harga = 0; // Variabel untuk menghitung total harga
        foreach ($_SESSION['keranjang'] as $id_produk => $jumlah):
          // Ambil data produk dari database berdasarkan id_produk
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
          $pecah = $ambil->fetch_assoc();

          // Hitung subharga untuk produk ini
          $subharga = $pecah['harga_produk'] * $jumlah;
          $total_harga += $subharga; // Tambahkan subharga ke total harga
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $pecah['nama_produk']; ?></td>
          <td>Rp. <?= number_format($pecah['harga_produk']); ?>,-</td>
          <td><?= $jumlah; ?></td>
          <td>Rp. <?= number_format($subharga); ?>,-</td>
          <td>
            <a href="hapuskeranjang.php?id=<?= $id_produk; ?>" class="btn btn-danger btn-xs">Hapus</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- Menampilkan total harga -->
    <div class="row">
      <div class="col-md-6">
        <h3>Total Harga: Rp. <?= number_format($total_harga); ?>,-</h3>
      </div>
      <div class="col-md-6 text-right">
        <a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
        <a href="checkout.php" class="btn btn-primary">Checkout</a>
      </div>
    </div>
    
  </div>
</section>

</body>
</html>