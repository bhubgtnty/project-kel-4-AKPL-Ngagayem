<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    
}if (!defined('SITEURL')) {
    define('SITEURL', 'http://localhost/toko-ngemil/');
}

$host = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'db_ngemil';

$koneksi = mysqli_connect($host,$username,$password) or die(mysqli_error());
$db_select = mysqli_select_db($koneksi, $database) or die(mysqli_error());

?>