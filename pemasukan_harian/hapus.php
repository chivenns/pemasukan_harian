<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM pemasukan_harian WHERE `Kode Transaksi`='$id'";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil dihapus.<br><a href='tampil.php'>Kembali</a>";
} else {
    echo "Error: " . $koneksi->error;
}
?>
