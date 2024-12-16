<?php
session_start();
include 'config/koneksi.php';

// Validasi: Periksa apakah pengguna sudah login
if (!isset($_SESSION['pelanggan']) || empty($_SESSION['pelanggan'])) {
    echo "<script>alert('Silakan login terlebih dahulu.');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

// Ambil data pengguna yang login
$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
$pelanggan = $ambil->fetch_assoc();

// Proses update profil
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_pelanggan'];
    $email_pelanggan = htmlspecialchars($_POST['email_pelanggan']);
    $telepon_pelanggan = htmlspecialchars($_POST['telepon_pelanggan']);
    $alamat = $_POST['alamat_pelanggan'];
    $password_pelanggan = htmlspecialchars($_POST['password_pelanggan']);

    // Jika password kosong, jangan diupdate
    if (empty($password_pelanggan)) {
        $query = "UPDATE pelanggan SET nama_pelanggan='$nama', email_pelanggan='$email_pelanggan', telepon_pelanggan='$telepon_pelanggan', alamat_pelanggan='$alamat' WHERE id_pelanggan='$id_pelanggan'";
    } else {
        // Jika password diisi, update password langsung tanpa hash
        $query = "UPDATE pelanggan SET nama_pelanggan='$nama', email_pelanggan='$email_pelanggan', telepon_pelanggan='$telepon_pelanggan', alamat_pelanggan='$alamat' password_pelanggan='$password_pelanggan' WHERE id_pelanggan='$id_pelanggan'";
    }

    if ($koneksi->query($query)) {
        echo "<script>alert('Profil berhasil diperbarui.');</script>";
        echo "<script>location='profil.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui profil.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php include 'templates/navbar.php'; ?>

<div class="container">
    <h3 class="my-4">Edit Profil</h3>
    <form method="POST">
        <div class="form-group">
            <label for="nama_pelanggan">Nama Lengkap</label>
            <input type="name" name="nama_pelanggan" id="nama_pelanggan" class="form-control" value="<?= $pelanggan['nama_pelanggan']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email_pelanggan">Email</label>
            <input type="email" name="email_pelanggan" id="email_pelanggan" class="form-control" value="<?= $pelanggan['email_pelanggan']; ?>" required>
        </div>
        <div class="form-group">
            <label for="telepon_pelanggan">Nomor HP</label>
            <input type="text" name="telepon_pelanggan" id="telepon_pelanggan" class="form-control" value="<?= $pelanggan['telepon_pelanggan']; ?>" required>
        </div>
        <div class="form-group">
            <label for="password_pelanggan">Password Baru (Opsional)</label>
            <input type="password" name="password_pelanggan" id="password_pelanggan" class="form-control" placeholder="Isi jika ingin mengganti password">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="profil.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

</body>
</html>
