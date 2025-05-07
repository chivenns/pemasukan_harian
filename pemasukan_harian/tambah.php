<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nominal = $_POST['nominal'];
    $keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO pemasukan_harian (`Nominal Transaksi`, `Keterangan`) 
            VALUES ('$nominal', '$keterangan')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan.<br><a href='tampil.php'>Lihat Data</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>

<form method="POST">
    <label>Nominal Transaksi:</label><br>
    <input type="number" name="nominal" required><br>
    
    <label>Keterangan:</label><br>
    <textarea name="keterangan" rows="4" cols="30" required></textarea><br>

    <button type="submit">Tambah</button>
</form>
