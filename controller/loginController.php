<?php
session_start();
include '../config/database.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$message = '';

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $_SESSION['login'] = true;
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['email'] = $user['email'];

    var_dump($_SESSION); 

    header('Location: ../pages/dashboard.php');
} else {
    echo "<script>
                alert('Username atau password anda tidak valid');
                location.href='../index.php';
            </script>";
}
?>