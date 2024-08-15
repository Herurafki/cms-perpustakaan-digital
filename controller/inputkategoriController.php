<?php
include '../config/database.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['nama_kategori'];

    
    $checkUser = $conn->query("SELECT * FROM kategoris WHERE (nama_kategori)=('$name')");
    if ($checkUser->num_rows > 0) {
        $message= "Username sudah terdaftar. Silakan pilih username lain.";
    } else {
        
        $query = "INSERT INTO kategoris (nama_kategori) VALUES ('$name')";

        if ($conn->query($query) === TRUE) {
            echo "<script>
                alert('Data kategori berhasil diinputkan');
                location.href='../pages/input-kategori.php';
            </script>";
        } else {
            $message = "Error: " . $query . "<br>" . $conn->error;
        }
    }
}

$conn->close(); 
?>
