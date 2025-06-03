<?php
    include '../../connection/conn.php';

    $nama_resto = $_POST['nama_resto'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($conn, "SELECT MAX(id_resto) AS id_resto FROM restoran");
    $data = mysqli_fetch_array($query);
    $lastID = $data['id_resto'];

    if ($lastID) {
        $lastNumber = (int) substr($lastID, 3);
        $newNumber = $lastNumber + 1;
    } else {
        $newNumber = 1;
    }

    $newID = 'RES' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

    $simpan = mysqli_query($conn, "INSERT INTO restoran (id_resto, nama_resto, nama_pemilik, alamat) 
                                    VALUES ('$newID', '$nama_resto','$nama_pemmilik', '$alamat')");

    if(!$simpan){
        echo "SINTAK ERROR: " . mysqli_error($conn);
    } else {
        echo "<script>
                alert('Data Berhasil Disimpan');
                window.location.href='../../media.php?content=restoran';
            </script>";
    }
?>
