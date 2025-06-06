<?php
    include '../../connection/conn.php';

    $nama_makanan = $_POST['nama_makanan'];
    $id_resto = $_POST['id_resto'];
    $harga = $_POST['alamat'];

    $query = mysqli_query($conn, "SELECT MAX(id_resto) AS id_makanan FROM makanan");
    $data = mysqli_fetch_array($query);
    $lastID = $data['id_makanan'];

    if ($lastID) {
        $lastNumber = (int) substr($lastID, 3);
        $newNumber = $lastNumber + 1;
    } else {
        $newNumber = 1;
    }

    $newID = 'MAK' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

    $simpan = mysqli_query($conn, "INSERT INTO makanan (id_makanan, nama_makanan, id_resto, harga) 
                                    VALUES ('$newID', '$nama_makanan','$id_resto', '$harga')");

    if(!$simpan){
        echo "SINTAK ERROR: " . mysqli_error($conn);
    } else {
        echo "<script>
                alert('Data Berhasil Disimpan');
                window.location.href='../../media.php?content=makanan';
            </script>";
    }
?>