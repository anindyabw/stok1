<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h2>Tambah Data Barang</h2>
    <form action="prosestambah.php" method="post">
        Nama Barang: <input type="text" name="nama_barang" required><br><br>
        Jumlah: <input type="number" name="jumlah" required><br><br>
        Satuan: <input type="text" name="satuan" required><br><br>
        Harga: <input type="number" name="harga" required><br><br>
        <button type="submit" name="simpan">Simpan</button>
    </form>
    <br>
    <a href="index.php">Kembali</a> |
    <a href="logout.php">Logout</a>
</body>
</html>