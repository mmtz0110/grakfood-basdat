<?php
    include '../../connection/conn.php';

    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_hp = $_POST['no_hp'];

    $query = mysqli_query($conn, "SELECT MAX(id_pelanggan) AS pelanggan FROM pelanggan");
    $data = mysqli_fetch_array($query);
    $lastID = $data['id_pelanggan'];

    if ($lastID) {
        $lastNumber = (int) substr($lastID, 3);
        $newNumber = $lastNumber + 1;
    } else {
        $newNumber = 1;
    }

    $newID = 'PEL' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

    $simpan = mysqli_query($conn, "INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, no_hp) 
                                    VALUES ('$newID', '$nama_pelanggan', '$no_hp')");

    if(!$simpan){
        echo "SINTAK ERROR: " . mysqli_error($conn);
    } else {
        echo "<script>
                alert('Data Berhasil Disimpan');
                window.location.href='../../media.php?content=pelanggan';
            </script>";
    }
?>
