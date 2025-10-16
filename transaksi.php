<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Transaksi</title>
</head>
<body>
    <h2>Transaksi Barang</h2>
    <form action="" method="post">
        Pilih Barang:
        <select name="id_barang" required>
            <option value="">-- Pilih --</option>
            <?php
            $barang = mysqli_query($koneksi, "SELECT * FROM barang");
            while ($b = mysqli_fetch_assoc($barang)) {
                echo "<option value='{$b['id']}'>{$b['nama_barang']} (stok: {$b['jumlah']}) </option>";
            }
            ?>
        </select><br><br>

        Jenis Transaksi:
        <select name="jenis" required>
            <option value="beli">Beli (+)</option>
            <option value="jual">Jual (-)</option>
        </select><br><br>

        Jumlah:
        <input type="number" name="jumlah" min="1" required><br><br>
        <button type="submit" name="proses">Proses</button>
    </form>
    <br>
    <a href="index.php">Kembali</a> |
    <a href="logout.php">Logout</a>

    <?php
    if (isset($_POST['proses'])) {
        $id_barang = $_POST['id_barang'];
        $jenis = $_POST['jenis'];
        $jumlah = $_POST['jumlah'];

        // ambil stok saat ini
        $q = mysqli_query($koneksi, "SELECT jumlah FROM barang WHERE id=$id_barang");
        $data = mysqli_fetch_assoc($q);
        $stok = $data['jumlah'];

        if ($jenis == 'jual' && $jumlah > $stok) {
            echo "<p style='color:red;'>Stok tidak cukup!</p>";
        } else {
            // simpan ke tabel transaksi
            mysqli_query($koneksi, "INSERT INTO transaksi (id_barang, jenis, jumlah) VALUES ($id_barang, '$jenis', $jumlah)");

            // update stok
            if ($jenis == 'beli') {
                mysqli_query($koneksi, "UPDATE barang SET jumlah = jumlah + $jumlah WHERE id = $id_barang");
            } else {
                mysqli_query($koneksi, "UPDATE barang SET jumlah = jumlah - $jumlah WHERE id = $id_barang");
            }

            echo "<p style='color:green;'>Transaksi berhasil!</p>";
        }
    }
    ?>
</body>
</html>