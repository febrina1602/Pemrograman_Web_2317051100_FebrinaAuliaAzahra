<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
 
<head>
 <title>Data Mahasiswa</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body class="container mt-5">
 <h2>Data User</h2>
 <a href="tambah.php" class="btn btn-primary mb-3"> Tambah Data</a>
 <a href="logout.php" class="btn btn-warning mb-3"> Logout</a>
 <table class="table table-bordered">
  <thead class="table-primary">
   <tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Image</th>
    <th>Aksi</th>
   </tr>
  </thead>
  <tbody>
   <?php
    $no = 1;
   $result = mysqli_query($conn, "SELECT * FROM data");
   while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>

<td>{$row['id']}</td>
<td>{$row['username']}</td>
<td><img src='{$row['image']}' width='100'></td>
<td>
 
<a href='edit.php?id={$row['id']}' class='btn btn-success btn-sm'>Edit</a>
 
<a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
</td>
</tr>";
     $no++;
   }
   ?>
  </tbody>
 </table>
</body>
 
</html>