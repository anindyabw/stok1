<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
</head>
<body>
    <h2>Riwayat Transaksi</h2>
    <a href="index.php">Kembali</a> |
    <a href="logout.php">Logout</a>
    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Jenis</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
        </tr>

        <?php
        $result = mysqli_query($koneksi, "
            SELECT t.*, b.nama_barang
            FROM transaksi t
            JOIN barang b ON t.id_barang = b.id
            ORDER BY t.tanggal DESC
        ");
        WHILE ($row = mysqli_fetch_assoc($result)) {
            $warna = $row['jenis'] == 'jual' ? 'red' : 'green';
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nama_barang']}</td>
                    <td style='color:$warna;'>{$row['jenis']}</td>
                    <td>{$row['jumlah']}</td>
                    <td>{$row['tanggal']}</td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>