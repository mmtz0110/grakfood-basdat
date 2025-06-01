<?php
    session_start();
    if (isset($_SESSION['login'])){
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN PEGAWAI</title>
    <link rel="stylesheet" href="css/login-style.css" type="text/css">
</head>
<body>
    <?php
        if (isset($_GET['validasi'])){
            if ($_GET['validasi'] == 'gagal'){
                $validasi = 'Username atau Password salah';
            }
        }else{
            $validasi = '';
        }
    ?>
    <div class="judul">
        <h1><span style="color:#037737;">GRAK</span>FOOD</h1>
    </div>
    <div class="login-card">
        <form action="login_check.php" method="post">
            <h2>Login</h2>
            <div class="validasi">
                <?php echo $validasi; ?>
            </div>
            <div class="input-group">
                <input type="text" name="username" id="username" class="input-field" placeholder="Masukan Username" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="password" class="input-field" placeholder="Masukan Password" required>
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
</body>
</html>