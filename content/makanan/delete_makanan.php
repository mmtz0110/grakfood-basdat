<?php
include '../../connection/conn.php';

$id_makanan = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM makanan WHERE id_makanan='$id_makanan'");

if (!$delete) {
    echo "SINTAK ERROR: " . mysqli_error($conn);
} else {
    echo "<script>alert('Data Berhasil Dihapus'); window.location.href='../../media.php?content=makanan'</script>";
}
?>