<?php include "koneksi.php";
if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        mysqli_query($conn, "INSERT INTO data (username, password,image) VALUES('$username', '$password', '$targetFile')");
        echo "File " . htmlspecialchars(basename($_FILES["file"]["name"])) . " berhasil diupload.";
        header("Location: dashboard.php");
    } else {
        echo "Terjadi kesalahan saat upload file.";
    }
}
?>