<?php
include '../../connection/conn.php';

$id_resto = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM restoran WHERE id_resto='$id_resto'");

if (!$delete) {
    echo "SINTAK ERROR: " . mysqli_error($conn);
} else {
    echo "<script>alert('Data Berhasil Dihapus'); window.location.href='../../media.php?content=restoran'</script>";
}
?>