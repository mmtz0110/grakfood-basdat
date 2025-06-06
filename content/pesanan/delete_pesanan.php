<?php
include '../../connection/conn.php';

$id_pesanan = $_GET['id'];

$delete = mysqli_query($conn, "DELETE FROM pesanan WHERE id_pesanan = '$id_pesanan'");

if (!$delete) {
    echo "SINTAK ERROR: " . mysqli_error($conn);
} else {
    echo "<script>
            alert('Data Pesanan Berhasil Dihapus');
            window.location.href='../../media.php?content=pesanan';
        </script>";
}
?>
