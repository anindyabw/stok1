<?php
session_start();

include 'koneksi.php';
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD DATA BARANG</title>
</head>
<body>
    <h2>Daftar Stok Barang</h2>
    <a href="tambah.php">Tambah Data Barang</a> |
    <a href="transaksi.php">Cek Transaksi</a> |
    <a href="riwayat.php">Riwayat Transaksi</a> |
    <a href="logout.php">Logout</a>
    <br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = mysqli_query($koneksi, "SELECT* FROM barang");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nama_barang']}</td>
                <td>{$row['jumlah']}</td>
                <td>{$row['satuan']}</td>
                <td>{$row['harga']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> |
                    <a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
                <td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>