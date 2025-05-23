<?php
include "koneksi.php";
$id = $_GET['id'];

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];

    // Foto
    if ($_FILES['foto']['name']) {
        $foto = $_FILES['foto']['name'];
        $target = "uploads/" . basename($foto);
        move_uploaded_file($_FILES['foto']['tmp_name'], $target);
        $conn->query("UPDATE users SET nama='$nama', username='$username', foto='$foto' WHERE id=$id");
    } else {
        $conn->query("UPDATE users SET nama='$nama', username='$username' WHERE id=$id");
    }

    echo "User berhasil diupdate. <a href='index.php'>Kembali</a>";
    exit;
}

$user = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();
?>

<h2>Edit User</h2>
<form method="post" enctype="multipart/form-data">
    Username: <input type="text" name="username" value="<?= $user['username'] ?>"><br>
    Nama: <input type="text" name="nama" value="<?= $user['nama'] ?>"><br>
    Ganti Foto: <input type="file" name="foto"><br>
    <img src="uploads/<?= $user['foto'] ?>" width="100"><br>
    <input type="submit" name="update" value="Update">
</form>
