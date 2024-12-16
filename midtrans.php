<?php
require_once dirname(__FILE__) . '/Midtrans/Midtrans.php';

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-xtO6lBfgpfWZWvzkmReb_W3q'; // Ganti dengan Server Key Anda
Midtrans\Config::$clientKey = 'SB-Mid-client-yIYmyGNLCJ4p36Jx';
\Midtrans\Config::$isProduction = false; // Set ke false untuk sandbox
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = false;

?>