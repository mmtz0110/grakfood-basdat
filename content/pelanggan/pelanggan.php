<?php
    include '././connection/conn.php';
    $no = 1;
?>
<div class="container">
    <div class="content">
        <h4>Data Pelanggan</h4>
    </div>
</div>

<div class="tambah-data">
    <div class="content">
        <form action="content/pelanggan/act_pelanggan.php" method='post'>
            <h4>Tambah Data Pelanggan</h4>
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" placeholder="Input Nama Pelanggan" required>

            <label>Nomor Handphone</label>
            <input type="text" name="no_hp" placeholder="Nomor Handphone" required>

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
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Nomor Handphone</th>
            <th>Tools</th>
        </tr>
        <?php
            $data_pelanggan = mysqli_query($conn,"SELECT * FROM pelanggan");
            while ($row=mysqli_fetch_array($data_pelanggan)){
                $modalId = 'modal-'.$row['id_pelanggan'];
        ?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $row['id_pelanggan']?></td>
            <td><?php echo $row['nama_pelanggan']?></td>
            <td><?php echo $row['no_hp']?></td>
            <td>
                <!-- Modal trigger -->
                <label for="<?php echo $modalId ?>" class="btn-edit">Edit</label>
                <a href="content/pelanggan/delete_pelanggan.php?id=<?php echo $row['id_pelanggan']?>" onClick="return confirm('apakah Anda Yakin Hapus Data?')" class="btn-delete">Hapus</a>
            </td>
        </tr>

        <!-- Modal edit -->
        <input type="checkbox" id="<?php echo $modalId ?>" class="modal-toggle" hidden>
        <div class="modal-overlay">
            <div class="modal-box">
                <label for="<?php echo $modalId ?>" class="close-btn">&times;</label>
                <form action="content/pelanggan/act_edit_pelanggan.php" method="post">
                    <h3>Edit pelanggan</h3>
                    <input type="hidden" name="id_pelanggan" value="<?php echo $row['id_pelanggan']; ?>">

                    <label>Nama pelanggan</label>
                    <input type="text" name="nama_pelanggan" value="<?php echo $row['nama_pelanggan']; ?>" required>

                    <label>Nomor Handphone</label>
                    <input type="text" name="no_hp" value="<?php echo $row['no_hp']; ?>" required>

                    <button type="submit">Simpan</button>
                </form>
            </div>
        </div>
        <?php } ?>
    </table>
</div>
