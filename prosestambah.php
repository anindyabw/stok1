<?php include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO barang (nama_barang, jumlah, satuan, harga) VALUES ('$nama', '$jumlah', '$satuan', '$harga')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>
                alert('Barang berhasil ditambahkan!');
                window.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Gagal menambahkan barang!');
                window.location.href = 'index.php';
            </script>";
    }
} else {
    // jika user akses langsung tanpa submit form
    header("Location: tambah.php");
    exit;
}
?>