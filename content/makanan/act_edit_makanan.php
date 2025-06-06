<?php
    include '../../connection/conn.php';
    $id_makanan = $_POST['id_makanan'];
    $nama_makanan = $_POST['nama_makanan'];
    $id_resto = $_POST['id_resto'];
    $harga = $_POST['harga'];
    $edit = mysqli_query($conn, "UPDATE makanan SET
        nama_makanan='$nama_makanan',
        id_resto='$id_resto',
        harga='$harga'
        WHERE id_makanan='$id_makanan'");
    if(!$edit){
        echo "SINTAK ERROR:".mysqli_error($conn);
    }else{
        echo "<script>alert('Data Berhasil Di Edit');window.location.href='../../media.php?content=makanan'</script>";
    }
?>