<?php include "koneksi.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $foto_name = $_FILES['foto']['name'];
    $target = "uploads/" . basename($foto_name);
    move_uploaded_file($_FILES['foto']['tmp_name'], $target);

    $stmt = $conn->prepare("INSERT INTO users (username, password, nama, foto) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $nama, $foto_name);
    $stmt->execute();

    echo "User berhasil ditambahkan";
}

$result = $conn->query("SELECT * FROM users");
?>

<form method="post">
    Username: <input type="text" name="username"><br>
    Nama: <input type="text" name="nama"><br>
    Password: <input type="password" name="password"><br>
    Foto: <input type="file" name="foto"><br>
    <input type="submit" name="submit" value="Tambah User">
</form>

<br><br>
<h2>Daftar User</h2>
<a href="user_create.php">Tambah User</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th><th>Username</th><th>Nama</th><th>Foto</th><th>Aksi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['username']) ?></td>
        <td><?= htmlspecialchars($row['nama']) ?></td>
        <td><img src="uploads/<?= $row['foto'] ?>" width="50"></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>