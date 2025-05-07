<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nominal = $_POST['nominal'];
    $keterangan = $_POST['keterangan'];

    $sql = "UPDATE pemasukan_harian 
            SET `Nominal Transaksi`='$nominal', `Keterangan`='$keterangan' 
            WHERE `Kode Transaksi`='$id'";
    
    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil diubah.<br><a href='tampil.php'>Kembali</a>";
    } else {
        echo "Error: " . $koneksi->error;
    }
}

$data = $koneksi->query("SELECT * FROM pemasukan_harian WHERE `Kode Transaksi`='$id'")->fetch_assoc();
?>

<form method="POST">
    <label>Nominal Transaksi:</label><br>
    <input type="number" name="nominal" value="<?= $data['Nominal Transaksi'] ?>" required><br>

    <label>Keterangan:</label><br>
    <textarea name="keterangan" rows="4" cols="30" required><?= $data['Keterangan'] ?></textarea><br>

    <button type="submit">Simpan</button>
</form>
