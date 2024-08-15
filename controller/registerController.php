<?php
include '../config/database.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = "user";

    
    $checkUser = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($checkUser->num_rows > 0) {
        $message= "Username sudah terdaftar. Silakan pilih username lain.";
    } else {
        
        $query = "INSERT INTO users (nama,email,username, password, role) VALUES ('$name','$email','$username', '$password', '$role')";
        if ($conn->query($query) === TRUE) {
            echo "<script>
            alert('Regristasi Berhasil');
            location.href='../index.php';
        </script>";
        } else {
            $message = "Error: " . $query . "<br>" . $conn->error;
            echo "<script>
                alert('Registrasi Gagal');
                location.href='../pages/register.php';
            </script>";
        }
    }
}

$conn->close(); 
?>
