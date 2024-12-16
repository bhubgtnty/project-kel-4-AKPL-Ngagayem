
<?php
include '../config/koneksi.php';
include 'partials/header.php';
// Mendapatkan id_pembelian dari url
$id_pembelian = $_GET['id'];

// Mengambil data pembayaran berdasarkan id_pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

?>

<div class="content-wrapper">
    <div class="content-header">
<h2>Data Pesanan</h2>

<div class="row">
  <div class="col-md-6">
    <form action="" method="post">
      <div class="form-group">
        <Label>No Resi Pengiriman</Label>
        <input type="text" class="form-control" name="resi">
      </div>
      <div class="form-group">
        <label for="">Status</label>
        <select name="status" id="" class="form-control">
          <option value="">Pilih Status</option>
          <option value="lunas">Lunas</option>
          <option value="barang dikirim">Barang Dikirim</option>
          <option value="batal">Batal</option>
        </select>
      </div>
      <button class="btn btn-success" name="proses">Proses</button>
    </form>
  </div>
</div>
</div>
</div>

<?php
if(isset($_POST['proses'])){
  $resi = $_POST['resi'];
  $status = $_POST['status'];
  $koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");

  echo "<script>alert('Data pembelian terupdate');</script>";
  echo "<script>location='pembelian.php';</script>";
}

?>




 