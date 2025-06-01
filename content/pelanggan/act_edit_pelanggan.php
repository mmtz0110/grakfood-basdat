<?php
    include '../../connection/conn.php';
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_hp = $_POST['no_hp'];
    $edit = mysqli_query($conn, "UPDATE pelanggan SET
        nama_pelanggan='$nama_pelanggan',
        no_hp='$no_hp'
        WHERE id_pelanggan='$id_pelanggan'");
    if(!$edit){
        echo "SINTAK ERROR:".mysqli_error($conn);
    }else{
        echo "<script>alert('Data Berhasil Di Edit');window.location.href='../../media.php?content=pelanggan'</script>";
    }
?>