<?php
session_start();
include '../../connection/conn.php';

$id_pelanggan = $_POST['id_pelanggan'];
$orderDate = $_POST['OrderDate'];
$id_makanan = $_POST['id_makanan'];
$jumlah = $_POST['jumlah'];

$query = mysqli_query($conn, "SELECT MAX(id_pesanan) AS id_pesanan FROM pesanan");
$data = mysqli_fetch_array($query);
$lastID = $data['id_pesanan'];

if ($lastID) {
    $lastNumber = (int) substr($lastID, 3);
    $newNumber = $lastNumber + 1;
} else {
    $newNumber = 1;
}

$newID = 'PES' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

$simpan = mysqli_query($conn, "
    INSERT INTO pesanan (id_pesanan, id_pelanggan, id_makanan, OrderDate, jumlah)
    VALUES ('$newID', '$id_pelanggan', '$id_makanan','$orderDate','$jumlah')
");

if (!$simpan) {
    echo "SINTAK ERROR: " . mysqli_error($conn);
} else {
    echo "<script>
            alert('Pesanan Berhasil Ditambahkan');
            window.location.href='../../media.php?content=pesanan';
        </script>";
}
?>
