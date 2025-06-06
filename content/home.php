<?php
session_start();
include './connection/conn.php';

// Ambil nama dari session
$nama_login = isset($_SESSION['nama_pegawai']) ? $_SESSION['nama_pegawai'] : 'User';

// Hitung semua jumlah data
$jml_pegawai   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pegawai"));
$jml_pelanggan = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pelanggan"));
$jml_resto     = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM restoran"));
$jml_makanan   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM makanan"));
$jml_pesanan   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pesanan"));
?>

<link rel="stylesheet" href="css/content-style.css">

<div class="container">
    <div class="welcome-message" style="text-align: center; margin: 20px 0; font-family: 'Courier New', monospace; font-size: 18px; background-color: #fffacd; padding: 10px; border: 2px solid #000; box-shadow: 3px 3px 0 #000;">
        Selamat datang di program pemesanan makanan, <b><?= $nama_login ?></b> 👋
    </div>
    <div class="content">
        <h4>Dashboard</h4>
    </div>
</div>

<div class="dashboard-cards">
    <div class="card-retro">
        <div class="card-header">Pegawai</div>
        <div class="card-body">
            <h2><?= $jml_pegawai ?></h2>
            <p>Jumlah Data Pegawai</p>
            <a href="media.php?content=pegawai" class="btn-link">Lihat Selengkapnya</a>
        </div>
    </div>

    <div class="card-retro">
        <div class="card-header">Pelanggan</div>
        <div class="card-body">
            <h2><?= $jml_pelanggan ?></h2>
            <p>Jumlah Data Pelanggan</p>
            <a href="media.php?content=pelanggan" class="btn-link">Lihat Selengkapnya</a>
        </div>
    </div>

    <div class="card-retro">
        <div class="card-header">Restoran</div>
        <div class="card-body">
            <h2><?= $jml_resto ?></h2>
            <p>Jumlah Data Restoran</p>
            <a href="media.php?content=restoran" class="btn-link">Lihat Selengkapnya</a>
        </div>
    </div>

    <div class="card-retro">
        <div class="card-header">Makanan</div>
        <div class="card-body">
            <h2><?= $jml_makanan ?></h2>
            <p>Jumlah Data Makanan</p>
            <a href="media.php?content=makanan" class="btn-link">Lihat Selengkapnya</a>
        </div>
    </div>

    <div class="card-retro">
        <div class="card-header">Pesanan</div>
        <div class="card-body">
            <h2><?= $jml_pesanan ?></h2>
            <p>Jumlah Data Pesanan</p>
            <a href="media.php?content=pesanan" class="btn-link">Lihat Selengkapnya</a>
        </div>
    </div>
</div>
