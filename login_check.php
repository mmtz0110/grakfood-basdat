<?php
session_start();

include 'connection/conn.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$data = mysqli_query($conn, "SELECT * FROM pegawai WHERE username = '$username' AND password = '$password'");
$cek_data = mysqli_num_rows($data);

if ($cek_data > 0) {
    $row = mysqli_fetch_assoc($data); 

    $_SESSION['login'] = "login";
    $_SESSION['id_pegawai'] = $row['id_pegawai'];

    header("Location: media.php?content=home");
} else {
    echo "<script>alert('Username atau Password anda salah'); window.location.href='index.php'</script>";
}
?>
