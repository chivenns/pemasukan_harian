<?php
$host = "localhost";
$user = "root"; // ganti jika berbeda
$pass = "";     // ganti jika ada password
$db   = "pemasukan";

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
