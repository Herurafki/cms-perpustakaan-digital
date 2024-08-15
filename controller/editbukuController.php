<?php
include '../config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $result = $conn->query("SELECT * FROM bukus WHERE id='$id'");
    if ($result->num_rows == 1) {
        $book = $result->fetch_assoc();
    } else {
        echo "Buku tidak ditemukan.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $id_kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];
    $file_path = $book['file_buku'];
    $cover = $book['cover_buku'];

    
    if (!empty($_FILES['file']['name'])) {
        $file_name = basename($_FILES['file']['name']);
        $file_path = "../uploads/files/" . $file_name;
        move_uploaded_file($_FILES['file']['tmp_name'], $file_path);
    }

    
    if (!empty($_FILES['cover']['name'])) {
        $cover_name = basename($_FILES['cover']['name']);
        $cover = "../uploads/covers/" . $cover_name;
        move_uploaded_file($_FILES['cover']['tmp_name'], $cover);
    }

    
    $query = "UPDATE bukus SET judul_buku='$judul', id_kategori='id_kategori', deskripsi='$deskripsi', jumlah='$jumlah', file_buku='$file_path', cover_buku='$cover' WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        echo "<script>
                alert('Data buku berhasil diperbaharui');
                location.href='../pages/buku.php';
            </script>";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$conn->close();
?>