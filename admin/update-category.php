<?php 
include('partials/header.php'); 
include '../config/koneksi.php';

if(isset($_SESSION['add'])) {
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}

if(isset($_SESSION['delete'])) {
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}

if(isset($_SESSION['update'])) {
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}

// Cek jika id kategori ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data kategori dari database
    $sql = "SELECT * FROM kategori WHERE id_kategori = $id";
    $res = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($res) == 1) {
        // Ambil data kategori
        $row = mysqli_fetch_assoc($res);
        $title = $row['nama_kategori'];
    } else {
        // Jika kategori tidak ditemukan
        $_SESSION['no-category-found'] = "<div class='error'>Kategori tidak ditemukan.</div>";
        echo "<script>location='kategori.php';</script>";
    }
} else {
    // Jika id tidak ada di URL
    echo "<script>location='kategori.php';</script>";
}
?>

<!-- Form Update Kategori -->
<div class="content-wrapper">
    <div class="content-header">
        <h1>Update Kategori</h1>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Nama Kategori: </td>
                    <td>
                        <input type="text" name="nama" value="<?php echo $title; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Kategori" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
// Proses Update Kategori
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $id = $_POST['id'];
    $title = $_POST['nama'];

    // Query update kategori di database
    $sql2 = "UPDATE kategori SET nama_kategori = '$title' WHERE id_kategori = $id";

    // Eksekusi query
    $res2 = mysqli_query($koneksi, $sql2);

    if ($res2 == true) {
        // Jika berhasil, redirect ke halaman kategori
        $_SESSION['update'] = "<div class='success'>Kategori berhasil diperbarui.</div>";
        echo "<script>location='kategori.php';</script>";
    } else {
        // Jika gagal, beri pesan error
        $_SESSION['update'] = "<div class='error'>Gagal memperbarui kategori.</div>";
        echo "<script>location='kategori.php';</script>";
    }
}
?>

<?php include('partials/footer.php'); ?>
