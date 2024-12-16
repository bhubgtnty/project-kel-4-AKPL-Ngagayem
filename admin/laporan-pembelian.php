<?php
include '../config/koneksi.php';
include 'partials/header.php';

$semuadata = [];
$tgl_mulai = "-";
$tgl_selesai = "-";
$filteredData = [];

// Ambil semua data pendapatan awal
$ambilSemua = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan");
while ($pecahSemua = $ambilSemua->fetch_assoc()) {
    $semuadata[] = $pecahSemua;
}

// Jika form di-submit untuk filtering berdasarkan tanggal
if (isset($_POST['kirim'])) {
    $tgl_mulai = $_POST['tglm'];
    $tgl_selesai = $_POST['tgls'];

    $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
    while ($pecah = $ambil->fetch_assoc()) {
        if ($pecah['status_pembelian'] !== 'pending') {
            $filteredData[] = $pecah;
        }
    }
}

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan Pendapatan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Pendapatan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <h4>Laporan Pembelian dari <?= $tgl_mulai; ?> hingga <?= $tgl_selesai; ?></h4>

    <form action="" method="post">
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="">Tanggal Mulai</label>
            <input type="date" class="form-control" name="tglm" value="<?= $tgl_mulai; ?>">
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label for="">Tanggal Selesai</label>
            <input type="date" class="form-control" name="tgls" value="<?= $tgl_selesai; ?>">
          </div>
        </div>
        <div class="col-md-2">
          <label for="">&nbsp;</label><br>
          <button class="btn btn-primary" name="kirim">Lihat</button>
        </div>
      </div>
    </form>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Pelanggan</th>
          <th>Tanggal</th>
          <th>Jumlah</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $totalFiltered = 0; ?>
        <?php foreach ($filteredData as $key => $value): ?>
        <?php $totalFiltered += $value['total_pembelian']; ?>
        <tr>
          <td><?= $key + 1; ?>.</td>
          <td><?= $value['nama_pelanggan']; ?></td>
          <td><?= $value['tanggal_pembelian']; ?></td>
          <td>Rp. <?= number_format($value['total_pembelian']); ?>,-</td>
          <td><?= $value['status_pembelian']; ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="3">Total</th>
          <th>Rp. <?= number_format($totalFiltered); ?>,-</th>
        </tr>
      </tfoot>
    </table>

</div>
