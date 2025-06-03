<?php
    include '../../connection/conn.php';

    $nama_pegawai = $_POST['nama_pegawai'];
    $inUsername = $_POST['inUsername'];
    $inPassword = $_POST['inPassword'];

    $query = mysqli_query($conn, "SELECT MAX(id_pegawai) AS id_pegawai FROM pegawai");
    $data = mysqli_fetch_array($query);
    $lastID = $data['id_pegawai'];

    if ($lastID) {
        $lastNumber = (int) substr($lastID, 3);
        $newNumber = $lastNumber + 1;
    } else {
        $newNumber = 1;
    }

    $newID = 'PEG' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

    $simpan = mysqli_query($conn, "INSERT INTO pegawai (id_pegawai, username, password, nama_pegawai) 
                                    VALUES ('$newID', '$inUsername', md5('$inPassword'), '$nama_pegawai')");

    if(!$simpan){
        echo "SINTAK ERROR: " . mysqli_error($conn);
    } else {
        echo "<script>
                alert('Data Berhasil Disimpan');
                window.location.href='../../media.php?content=pegawai';
            </script>";
    }
?>
