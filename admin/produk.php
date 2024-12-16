<?php
include 'partials/header.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<table class="table table-bordered">
	<thead>
		<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Kategori</th>
		<th>Harga</th>
		<th>Berat</th>
		<th>Foto</th>
		<th>Stok</th>
		<th>aksi</th>
		</tr> 
	</thead>
	<tbody>

		<?php $no=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori") ?>
		<?php while($pecah = $ambil->fetch_assoc()): ?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $pecah["nama_produk"]; ?></td>
			<td><?= $pecah['nama_kategori']; ?></td>
			<td>Rp. <?= number_format($pecah["harga_produk"]); ?>,-</td>
			<td><?= $pecah["berat_produk"]; ?></td>
			<td>
				<img src="../foto_produk/<?= $pecah["foto_produk"]; ?>" width="100">
			</td>
			<td><?= $pecah['stok_produk']; ?></td>
			<td>
				<a href="ubahproduk.php?&id=<?= $pecah['id_produk']; ?>" class="btn btn-warning btn-xs">ubah</a> | 
				<a href="detailproduk.php?&id=<?= $pecah['id_produk']; ?>" class="btn btn-info btn-xs">detail</a> | 
				<a href="hapusproduk.php?&id=<?= $pecah['id_produk']; ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs">hapus</a>
			</td>
		</tr>
		<?php $no++; ?>
		<?php endwhile; ?>

	</tbody>
</table>

<a href="tambahproduk.php" class="btn btn-primary">Tambah Data Produk</a>