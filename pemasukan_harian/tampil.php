<?php
include 'db.php';

$sql = "SELECT * FROM pemasukan_harian ORDER BY `Kode Transaksi` DESC";
$result = $koneksi->query($sql);

if (!$result) {
    die("Query gagal: " . $koneksi->error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<style>
    body {
    margin: 0;
    font-family: 'montserrat';
    background: #f4f4f4;
    color: #333;
  }
  #container {
    display: flex;
    min-height: 100vh;
  }
  aside {
    width: 250px;
    background: #fff;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0,0,0,0.1);
  }
  aside a {
    display: block;
    margin-bottom: 16px;
    color: #0077cc;
    text-decoration: none;
    font-weight: 500;
  }
  aside {
    width: 250px;
    background: #fff;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0,0,0,0.1);
  }
  
  aside .menu-item {
    position: relative;
  }
  
  aside a {
    display: block;
    margin-bottom: 16px;
    color: #0077cc;
    text-decoration: none;
    font-weight: 500;
  }
  
  /* Submenu default hidden */
  .submenu {
    display: none;
    margin-left: 10px;
  }
  
  /* Tampilkan submenu saat hover */
  .menu-item:hover .submenu {
    display: block;
  }
  
  /* Style submenu link */
  .submenu a {
    font-weight: 400;
    font-size: 14px;
    color: #555;
    margin-bottom: 10px;
  }
  
  /* Responsive: jadikan aside horizontal di layar kecil */
  @media (max-width: 768px) {
    #container {
      flex-direction: column;
    }
  
    aside {
      width: 100%;
      box-shadow: none;
      border-bottom: 1px solid #ccc;
    }
  
    aside .menu-item {
      margin-bottom: 10px;
    }
  }

  #main-content {
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  header, footer {
    background: #fff;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
  }
  main {
    padding: 20px;
    flex: 1;
  }
  .grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 32px;
  }
  .card {
    background: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: box-shadow 0.3s ease;
  }

  .table-wrapper {
  width: 90%;
  margin: 0 auto;
}

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 48px;
    }
    th, td {
        border: 1px solid #aaa;
        padding: 10px;
        text-align: left;
        background-color:rgb(255, 255, 255);
        font-weight: 600;
    }
    th {
        background-color:rgb(50, 203, 93);
    }
    a {
        text-decoration: none;
        color: blue;
        margin-right: 10px;
    }
    a:hover {
        text-decoration: underline;
    }
</style>

</head>
<body>
    <!-- Div Container bertujuan untuk membungkus keseluruhan layout -->
    <div id="container">

        <!-- Aside berisi hyperlink sub menu E-Dashboard-->
        <aside>
            <h3>Menu</h3>
            <a href="index.html">Home</a>
            <a href="dashboard.html">Pemasukan</a>
              <div class="submenu">
                <a href="#">Sub Home 1</a>
                <a href="#">Sub Home 2</a>
              </div>
            <a href="">Pengeluaran</a>
              <div class="submenu">
                  <a href="#">Sub Home 1</a>
                  <a href="#">Sub Home 2</a>
                </div>
            <a href="">Kelola Akun</a>
        </aside>

        <div id="main-content">

            <!-- Bagian untuk judul -->
            <header>
                <h4>E-DASHBOARD - RM. Padang Berkah</h4>
            </header>

            <main>
                <h2>Pemasukan Harian</h2>
                        <a style="color: green; font-weight: 600;" href="tambah.php">Tambah Data</a>
                            <table border="1" cellpadding="10">
                                <tr>
                                    <th>Nominal Transaksi</th>
                                    <th>Keterangan</th>
                                    <th>Kode Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $row['Nominal Transaksi'] ?></td>
                                    <td><?= $row['Keterangan'] ?></td>
                                    <td><?= $row['Kode Transaksi'] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $row['Kode Transaksi'] ?>">Edit</a> |
                                        <a style="color: red;" href="hapus.php?id=<?= $row['Kode Transaksi'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </table>
                      </div>
                    </div>
            </main>
            <footer>

            </footer>
        </div>
    </div>
</body>
</html>

