<?php
include 'partials/header.php';
include '../config/koneksi.php';
$ambil = $koneksi->query("SELECT * FROM kategori");
while($tiap = $ambil->fetch_assoc()){
	$datakategori[] = $tiap;
}

// echo "<pre>";
// print_r($datakategori);
// echo "</pre>";

?>

<?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

<div class="content-wrapper">
    <div class="content-header">
<h2>Tambah Kategori</h2>

<div class="row">
	<div class="col-md-8">
		<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Nama Kategori</label>
					<input type="text" name="nama" class="form-control">
				</div>
			<button name="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>
</div>
</div>

<?php  
if(isset($_POST['submit']))
{
    //echo "Clicked";

    //1. Get the Value from CAtegory Form
    $title = $_POST['nama'];

    //2. Create SQL Query to Insert CAtegory into Database
    $sql = "INSERT INTO kategori SET 
        nama_kategori='$title'
    ";

    //3. Execute the Query and Save in Database
    $res = mysqli_query($koneksi, $sql);

    //4. Check whether the query executed or not and data added or not
    if($res==true)
    {
        //Query Executed and Category Added
        $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
        //Redirect to Manage Category Page
        echo "<script>alert('Data berhasil diubah');</script>";
        echo "<script>location='kategori.php';</script>";    
    }
    else
    {
        //Failed to Add CAtegory
        $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
        //Redirect to Manage Category Page
        echo "<script>alert('Data gagal');</script>";
        echo "<script>location='kategori.php';</script>";    
    }
}
?>



















 