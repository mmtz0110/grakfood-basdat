<?php
    include '././connection/conn.php';
    $no = 1;
?>
<div class="container">
    <div class="content">
        <h4>Data Pegawai</h4>
    </div>
</div>

<div class="tambah-data">
    <div class="content">
        <form action="content/pegawai/act_pegawai.php" method='post'>
            <h4>Tambah Data Pegawai</h4>
            <label>Nama Pegawai</label>
            <input type="text" name="nama_pegawai" placeholder="Input Nama Pegawai" required>

            <label>Username</label>
            <input type="text" name="inUsername" placeholder="Input Username" required>

            <label>Password</label>
            <input type="password" name="inPassword" placeholder="Input password" required>
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
            <th>ID Pegawai</th>
            <th>Nama Pegawai</th>
            <th>Username</th>
            <th>Tools</th>
        </tr>
        <?php
            $data_pegawai = mysqli_query($conn,"SELECT * FROM pegawai");
            while ($row=mysqli_fetch_array($data_pegawai)){
                $modalId = 'modal-'.$row['id_pegawai'];
        ?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $row['id_pegawai']?></td>
            <td><?php echo $row['nama_pegawai']?></td>
            <td><?php echo $row['username']?></td>
            <td>
                <!-- Modal trigger -->
                <label for="<?php echo $modalId ?>" class="btn-edit">Edit</label>
                <a href="content/pegawai/delete_pegawai.php?id=<?php echo $row['id_pegawai']?>" onClick="return confirm('apakah Anda Yakin Hapus Data?')" class="btn-delete">Hapus</a>
            </td>
        </tr>

        <!-- Modal edit -->
        <input type="checkbox" id="<?php echo $modalId ?>" class="modal-toggle" hidden>
        <div class="modal-overlay">
            <div class="modal-box">
                <label for="<?php echo $modalId ?>" class="close-btn">&times;</label>
                <form action="content/pegawai/act_edit_pegawai.php" method="post">
                    <h3>Edit Pegawai</h3>
                    <input type="hidden" name="id_pegawai" value="<?php echo $row['id_pegawai']; ?>">

                    <label>Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" value="<?php echo $row['nama_pegawai']; ?>" required>

                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $row['username']; ?>" required>

                    <button type="submit">Simpan</button>
                </form>
            </div>
        </div>
        <?php } ?>
    </table>
</div>
