<?php
include './connection/conn.php';

// Hitung semua jumlah data
$jml_pegawai   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pegawai"));
$jml_pelanggan = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pelanggan"));
$jml_resto     = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM restoran"));
$jml_makanan   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM makanan"));
$jml_pesanan   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pesanan"));
?>

<link rel="stylesheet" href="css/content-style.css">

<div class="container">
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
