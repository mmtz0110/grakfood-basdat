<?php
include '../../connection/conn.php';

$id_pegawai = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM pegawai WHERE id_pegawai='$id_pegawai'");

if (!$delete) {
    echo "SINTAK ERROR: " . mysqli_error($conn);
} else {
    echo "<script>alert('Data Berhasil Dihapus'); window.location.href='../../media.php?content=pegawai'</script>";
}
?>
