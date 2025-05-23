<?php 
    include "koneksi.php"; 
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
 <title>Tambah Data</title>
 <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body class="container mt-5">
    <h2>Tambah Data </h2>
    <form method="POST" action="tambah_gambar.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
            <div class="mb-3">
            <label>Gambar: </label>
            <input type="file" name="file" class="form-control" required>
        </div>
        
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>

</body>
 
</html>
 
 