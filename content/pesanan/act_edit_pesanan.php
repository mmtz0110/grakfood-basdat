<?php
include '../../connection/conn.php';

$id_pesanan   = $_POST['id_pesanan'];
$id_pelanggan = $_POST['id_pelanggan'];
$orderDate    = $_POST['OrderDate'];
$id_makanan   = $_POST['id_makanan'];
$jumlah       = $_POST['jumlah'];

$edit = mysqli_query($conn, "
    UPDATE pesanan SET
        id_pelanggan = '$id_pelanggan',
        OrderDate    = '$orderDate',
        id_makanan   = '$id_makanan',
        jumlah       = '$jumlah'
    WHERE id_pesanan = '$id_pesanan'
");

if (!$edit) {
    echo "SINTAK ERROR: " . mysqli_error($conn);
} else {
    echo "<script>
            alert('Data Pesanan Berhasil Diedit');
            window.location.href='../../media.php?content=pesanan';
        </script>";
}
?>
