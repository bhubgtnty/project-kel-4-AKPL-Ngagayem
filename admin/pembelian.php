<?php
include 'partials/header.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Pembelian</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Pembelian</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>



	<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal Pembelian</th>
			<th>Status Pembelian</th>
			<th>Total</th>
			<th>aksi</th>
		</tr> 
	</thead>
	<tbody>
		<?php $no=1; ?>
		<!-- Menggabungkan (join) tabel pelanggan dengan tabel pembelian -->
		<?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()): ?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $pecah["nama_pelanggan"]; ?></td>
			<td><?= date("d F Y", strtotime($pecah["tanggal_pembelian"])); ?></td>
			<td><?= $pecah["status_pembelian"]; ?></td>
			<td>Rp. <?= number_format($pecah["total_pembelian"]); ?>,-</td>
			<td>
				<a href="detail.php?&id=<?= $pecah["id_pembelian"]; ?>" class="btn btn-primary btn-xs">Detail</a>
				<?php if($pecah['status_pembelian'] != 'pending' && $pecah['status_pembelian'] != 'completed'): ?>
					<a href="pembayaran.php?&id=<?= $pecah['id_pembelian']; ?>" class="btn btn-success btn-xs">Pembayaran</a>
				<?php endif; ?>
			</td>
		</tr>
		<?php $no++; ?>
		<?php endwhile; ?>
	</tbody>
</table>
