<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Stok Barang</title>
</head>
<body>
    <h2>Login Admin</h2>
    <form action="" method="post">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>
    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit;
        } else {
            echo "<p style='color:red;'>Username atau password salah!</p>";
        }
    }
    ?>
</body>
</html>