<?php
include "koneksi.php";
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];
?>

<h2>Selamat Datang, <?= htmlspecialchars($user['nama']) ?></h2>
<img src="uploads/<?= $user['foto'] ?>" width="100"><br>
<a href="logout.php">Logout</a>
