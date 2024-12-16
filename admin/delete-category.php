<?php 
    //Include Constants File
    include('../config/koneksi.php');

    //echo "Delete Page";
    //Check whether the id and image_name value is set or not
    if(isset($_GET['id']))
    {
        //Get the Value and Delete
        //echo "Get Value and Delete";
        $id = $_GET['id'];

        //Delete Data from Database
        //SQL Query to Delete Data from Database
        $sql = "DELETE FROM kategori WHERE id_kategori=$id";

        //Execute the Query
        $res = mysqli_query($koneksi, $sql);

        //Check whether the data is delete from database or not
        if($res==true)
        {
            //SEt Success MEssage and REdirect
            $_SESSION['delete'] = "<div class='success'>kategori Deleted Successfully.</div>";
            //Redirect to Manage kategori
            echo "<script>alert('Data berhasil diubah');</script>";
            echo "<script>location='index.php?halaman=kategori';</script>";           }
        else
        {
            //SEt Fail MEssage and Redirecs
            $_SESSION['delete'] = "<div class='error'>Failed to Delete kategori.</div>";
            //Redirect to Manage kategori
            echo "<script>alert('Data berhasil diubah');</script>";
            echo "<script>location='index.php?halaman=kategori';</script>";           }

 

    }
    else
    {
        //redirect to Manage kategori Page
        header('location:'.SITEURL.'Admin/kategori.php');
    }
?>