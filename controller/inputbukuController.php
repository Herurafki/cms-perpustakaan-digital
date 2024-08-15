<?php
session_start();
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $id_kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];
    $file_path = '';
    $cover = '';

    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $file_name = basename($_FILES['file']['name']);
        $file_path = "../uploads/files/" . $file_name;
        move_uploaded_file($_FILES['file']['tmp_name'], $file_path);
    }

    if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
        $cover_name = basename($_FILES['cover']['name']);
        $cover = "../uploads/covers/" . $cover_name;
        move_uploaded_file($_FILES['cover']['tmp_name'], $cover);
    }

    
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO bukus (id_kategori,id_user,judul_buku, deskripsi, jumlah, file_buku, cover_buku) 
              VALUES ('$id_kategori','$user_id','$judul', '$deskripsi', '$jumlah', '$file_path', '$cover')";

    if ($conn->query($query) === TRUE) {
        echo "<script>
                alert('Data buku berhasil diinputkan');
                location.href='../pages/input-buku.php';
            </script>";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();
}
?>