<?php
include '../../connection/conn.php';

$id_pelanggan = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");

if (!$delete) {
    echo "SINTAK ERROR: " . mysqli_error($koneksi);
} else {
    echo "<script>alert('Data Berhasil Dihapus'); window.location.href='../../media.php?content=pelanggan'</script>";
}
?>
