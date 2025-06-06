<?php
    include '../../connection/conn.php';
    $id_resto = $_POST['id_resto'];
    $nama_resto = $_POST['nama_resto'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $alamat = $_POST['alamat'];
    $edit = mysqli_query($conn, "UPDATE restoran SET
        nama_resto='$nama_resto',
        nama_pemilik='$nama_pemilik',
        alamat='$alamat'
        WHERE id_resto='$id_resto'");
    if(!$edit){
        echo "SINTAK ERROR:".mysqli_error($conn);
    }else{
        echo "<script>alert('Data Berhasil Di Edit');window.location.href='../../media.php?content=restoran'</script>";
    }
?>