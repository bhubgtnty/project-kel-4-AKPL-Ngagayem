<?php
include 'partials/header.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Pelanggan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Pelanggan</li>
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
		<th>Email</th>
		<th>No Telepon</th>
		</tr> 
	</thead>
	<tbody>

		<?php $no=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM pelanggan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()): ?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $pecah["nama_pelanggan"]; ?></td>
			<td><?= $pecah["email_pelanggan"]; ?></td>
			<td><?= $pecah["telepon_pelanggan"]; ?></td>

		</tr>
		<?php $no++; ?>
		<?php endwhile; ?>

	</tbody>
</table>