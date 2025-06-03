<?php
if (isset($_GET['content'])){
    if ($_GET['content']=='home'){
        include 'content/home.php';
    }
    elseif($_GET['content']=='pegawai'){
        include 'content/pegawai/pegawai.php';}
        // END PEGAWAI

    elseif($_GET['content']=='pelanggan'){
        include 'content/pelanggan/pelanggan.php';}
        // END PELANGGAN

    elseif($_GET['content']=='restoran'){
        include 'content/restoran/restoran.php';}
        //END RESTORAN

    elseif($_GET['content']=='makanan'){
        include 'content/makanan/makanan.php';}
        // END MAKANAN

    elseif($_GET['content']=='pesanan'){
        include 'content/pesanan/pesanan.php';}
        // END PESANAN

    elseif($_GET['content']=='detail'){
        include 'content/detail_pesanan/detail_pesanan.php';}
    // END DETAIL PESANAN
    
    else{
        echo "<script>alert('Modul tidak ditemukan!'); window.location.href='home.php'</script>";
    }
}