<?php

//cek login/not
    if(!isset($_SESSION['admin']))
    {
        $_SESSION['no-login-msg'] = "<div class='error text-center'> Please Login.</div>";
        header('location:'.SITEURL.'Admin/login.php');
    }
?>