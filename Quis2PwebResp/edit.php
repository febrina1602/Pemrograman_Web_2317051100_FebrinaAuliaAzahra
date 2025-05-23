<?php
include "koneksi.php";

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM data WHERE id=$id"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2>Edit Data</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($data['username']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="file" class="form-control">
            <small class="form-text text-muted">Gambar: <?= htmlspecialchars($data['image']) ?></small>
        </div>

        <button type="submit" name="update" class="btn btn-success">Simpan</button>
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $username = $_POST['username'];
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);

        mysqli_query($conn, "UPDATE data SET username='$username', image='$targetFile' WHERE id=$id");

        echo "<div class='alert alert-success mt-3'>Data berhasil diupdate.</div>";
    }
    ?>
</body>
</html>