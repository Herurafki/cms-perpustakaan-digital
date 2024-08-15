<?php
include '../config/database.php';

$id = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $result = $conn->query("SELECT * FROM kategoris WHERE id='$id'");
    if ($result->num_rows == 1) {
        $book = $result->fetch_assoc();
    } else {
        echo "Kategori tidak ditemukan.";
        exit;
    }
} elseif (isset($_POST['id'])) {
    $id = $_POST['id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kategori = $_POST['nama_kategori'];
    
    $query = "UPDATE kategoris SET nama_kategori='$kategori' WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        echo "<script>
                alert('Data kategori buku berhasil diperbaharui');
                location.href='../pages/kategori.php';
            </script>";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$conn->close();
?>