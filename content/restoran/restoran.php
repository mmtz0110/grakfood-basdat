<?php
    include '././connection/conn.php';
    $no = 1;
?>
<div class="container">
    <div class="content">
        <h4>Data Nama Restoran</h4>
    </div>
</div>

<div class="tambah-data">
    <div class="content">
        <form action="content/restoran/act_resto.php" method='post'>
            <h4>Tambah Data Restoran</h4>
            <label>Nama Restoran</label>
            <input type="text" name="nama_resto" placeholder="Input Nama Restoran" required>
            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik" placeholder="Input Nama Pemilik" required>
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Input Alamat" required>
            <div class="modal-footer">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>

<div class="table-content">
    <table>
        <tr>
            <th>No</th>
            <th>ID Restoran</th>
            <th>Nama Restoran</th>
            <th>Nama Pemilik</th>
            <th>Alamat</th>
            <th>Tools</th>
        </tr>
        <?php
            $data_resto = mysqli_query($conn,"SELECT * FROM restoran");
            while ($row=mysqli_fetch_array($data_resto)){
                $modalId = 'modal-'.$row['id_resto'];
        ?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $row['id_resto']?></td>
            <td><?php echo $row['nama_resto']?></td>
            <td><?php echo $row['nama_pemilik']?></td>
            <td><?php echo $row['alamat']?></td>
            <td>
                <!-- Modal trigger -->
                <div class="tool-buttons">
                    <label for="<?php echo $modalId ?>" class="btn-edit">Edit</label>
                    <a href="content/restoran/delete_resto.php?id=<?php echo $row['id_resto']?>" onClick="return confirm('apakah Anda Yakin Hapus Data?')" class="btn-delete">Hapus</a>
                </div>
            </td>
        </tr>

        <!-- Modal edit -->
        <input type="checkbox" id="<?php echo $modalId ?>" class="modal-toggle" hidden>
        <div class="modal-overlay">
            <div class="modal-box">
                <label for="<?php echo $modalId ?>" class="close-btn">&times;</label>
                <form action="content/restoran/act_edit_resto.php" method="post">
                    <h3>Edit Restoran</h3>
                    <input type="hidden" name="id_resto" value="<?php echo $row['id_resto']; ?>">

                    <label>Nama Restoran</label>
                    <input type="text" name="nama_resto" value="<?php echo $row['nama_resto']; ?>" required>

                    <label>Nama Pemilik</label>
                    <input type="text" name="nama_pemilik" value="<?php echo $row['nama_pemilik']; ?>" required>

                    <label>Alamat</label>
                    <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required>

                    <button type="submit">Simpan</button>
                </form>
            </div>
        </div>
        <?php } ?>
    </table>
</div>