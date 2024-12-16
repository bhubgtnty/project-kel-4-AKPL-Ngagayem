<?php
include '../config/koneksi.php';
include 'partials/header.php';
$id_produk = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
$detailproduk = $ambil->fetch_assoc();

$fotoproduk = array();
$ambilfoto = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while($tiap = $ambilfoto->fetch_assoc()){
  $fotoproduk[] = $tiap;
}

// echo "<pre>";
// print_r($detailproduk);
// print_r($fotoproduk);
// echo "</pre>";

?>

<div class="content-wrapper">
    <div class="content-header">
<h2>Detail Produk</h2>
<table class="table">
  <tr>
    <th>Produk</th>
    <td><?= $detailproduk['nama_produk']; ?></td>
  </tr>
  <tr>
    <th>Kategori</th>
    <td><?= $detailproduk['nama_kategori']; ?></td>
  </tr>
  <tr>
    <th>Harga</th>
    <td>Rp. <?= number_format($detailproduk['harga_produk']) ?>,-</td>
  </tr>
  <tr>
    <th>Berat</th>
    <td><?= $detailproduk['berat_produk']; ?></td>
  </tr>
  <tr>
    <th>Deskripsi</th>
    <td><?= $detailproduk['deskripsi_produk']; ?></td>
  </tr>
  <tr>
    <th>Stok</th>
    <td><?= $detailproduk['stok_produk']; ?></td>
  </tr>
</table>

<div class="row">
  <?php foreach($fotoproduk as $key => $value): ?>
  <div class="col-md-4 text-center">
    <img src="../foto_produk/<?= $value['nama_produk_foto']; ?>" alt="" class="img-responsive"><br>
  </div>
  <?php endforeach; ?>
</div><br>
