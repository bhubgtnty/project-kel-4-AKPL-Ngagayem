<?php
// Koneksi ke database
include 'config/koneksi.php';

// Jika tidak ada session pelanggan (belum login)
if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
    echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Belanja</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'templates/navbar.php'; ?>

<section class="content">
    <div class="container">
        <h3>Riwayat Belanja <?= $_SESSION['pelanggan']['nama_pelanggan']; ?></h3>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // Mendapatkan id_pelanggan yang login dari session
                $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                if ($ambil->num_rows == 0): ?>
                    <tr>
                        <td colspan="5">Tidak ada data riwayat...</td>
                    </tr>
                <?php endif; ?>
                <?php while ($pecah = $ambil->fetch_assoc()): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= date("d F Y", strtotime($pecah['tanggal_pembelian'])); ?></td>
                        <td>
                            <?= $pecah['status_pembelian']; ?><br>
                            <?php if (!empty($pecah['resi_pengiriman'])): ?>
                                Resi : <?= $pecah['resi_pengiriman']; ?>
                            <?php endif; ?>
                        </td>
                        <td>Rp. <?= number_format($pecah['total_pembelian']); ?>,-</td>
                        <td>
                            <a href="nota.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-info">Nota</a>
                            <?php if ($pecah['status_pembelian'] == 'barang dikirim'): ?>
                                <a href="konfirmasi.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-success" 
                                   onclick="return confirm('Apakah Anda yakin ingin mengkonfirmasi pesanan ini?');">
                                   Konfirmasi Pesanan
                                </a>
                            <?php elseif ($pecah['status_pembelian'] == 'pending'): ?>
                                <a href="cancel.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-danger"
                                   onclick="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?');">
                                   Cancel
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>

</body>
</html>
