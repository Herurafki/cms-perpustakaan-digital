<?php
include '../config/database.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user_id = $_SESSION['user_id']; 


    $query = "DELETE FROM bukus WHERE id='$id' AND id_user='$user_id'";

    if ($conn->query($query) === TRUE) {
        echo "<script>
                alert('Data  buku berhasil dihapus');
                location.href='../pages/buku.php';
            </script>";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} else {
    echo "ID buku tidak ditemukan.";
}

$conn->close();
?>
