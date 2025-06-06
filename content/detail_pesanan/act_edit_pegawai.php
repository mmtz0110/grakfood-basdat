<?php
    include '../../connection/conn.php';
    $id_pegawai = $_POST['id_pegawai'];
    $username = $_POST['username'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $edit = mysqli_query($conn, "UPDATE pegawai SET
        username='$username',
        nama_pegawai='$nama_pegawai'
        WHERE id_pegawai='$id_pegawai'");
    if(!$edit){
        echo "SINTAK ERROR:".mysqli_error($conn);
    }else{
        echo "<script>alert('Data Berhasil Di Edit');window.location.href='../../media.php?content=pegawai'</script>";
    }
?>