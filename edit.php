<?php include 'koneksi.php'; ?>

<?php
$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM barang where id=$id");
$data = mysqli_fetch_assoc($result)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>

<body>
    <h2>Edit Data Barang</h2>
    <form action="" method="post">
        Nama Barang: <input type="text" name="nama_barang" value="<?= $data['nama_barang']; ?>" required><br><br>
        Jumlah: <input type="number" name="jumlah" value="<?= $data['jumlah']; ?>" required><br><br>
        Satuan: <input type="text" name="satuan" value="<?= $data['satuan']; ?>" required><br><br>
        Harga: <input type="number" name="harga" value="<?= $data['harga']; ?>" required><br><br>
        <button type="submit" name="update">Update</button>
    </form>
    <br>
    <a href="index.php">Kembali</a> |
    <a href="logout.php">Logout</a>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama_barang'];
        $jumlah = $_POST['jumlah'];
        $satuan = $_POST['satuan'];
        $harga = $_POST['harga'];

        mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama', jumlah='$jumlah', satuan='$satuan', harga='$harga' WHERE id=$id");
        echo "<p>Data berhasil diperbaharui!</php>";
    }
    ?>
</body>

</html>