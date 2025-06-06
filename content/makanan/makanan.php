<?php
include '././connection/conn.php';
$data_resto = mysqli_query($conn, "SELECT * FROM restoran");
$no = 1;
?>

<link rel="stylesheet" href="/grakfood/css/content-style.css">

<div class="container">
    <div class="content">
        <h4>Data Makanan</h4>
    </div>
</div>

<div class="tambah-data">
    <div class="content">
        <form action="content/makanan/act_makanan.php" method="post">
            <h4>Tambah Data Makanan</h4>

            <label>Nama Makanan</label>
            <input type="text" name="nama_makanan" placeholder="Input Nama Makanan" required>

            <label>Nama Restoran</label>
            <select name="id_resto" class="form-control" required>
                <option value="">Pilih Restoran</option>
                <?php
                mysqli_data_seek($data_resto, 0);
                while ($resto = mysqli_fetch_array($data_resto)) {
                ?>
                    <option value="<?= $resto['id_resto'] ?>"><?= $resto['nama_resto'] ?></option>
                <?php } ?>
            </select>

            <label>Harga</label>
            <input type="text" name="harga" placeholder="Input Harga" required>

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
            <th>ID Makanan</th>
            <th>Nama Makanan</th>
            <th>Nama Restoran</th>
            <th>Harga</th>
            <th>Tools</th>
        </tr>

        <?php
        // PERBAIKI QUERY INI
        $data_makanan = mysqli_query($conn, "
            SELECT m.*, r.nama_resto
            FROM makanan m
            JOIN restoran r ON m.id_resto = r.id_resto
        ");

        while ($row = mysqli_fetch_array($data_makanan)) {
            $modalId = 'modal-' . $row['id_makanan'];
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['id_makanan'] ?></td>
                <td><?= $row['nama_makanan'] ?></td>
                <td><?= $row['nama_resto'] ?></td>
                <td><?= "Rp." . number_format($row['harga']) ?></td>
                <td>
                    <div class="tool-buttons">
                        <label for="<?= $modalId ?>" class="btn-edit">Edit</label>
                        <a href="content/makanan/delete_makanan.php?id=<?= $row['id_makanan'] ?>" class="btn-delete" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </div>
                </td>
            </tr>

            <!-- Modal Edit -->
            <input type="checkbox" id="<?= $modalId ?>" class="modal-toggle" hidden>
            <div class="modal-overlay">
                <div class="modal-box">
                    <label for="<?= $modalId ?>" class="close-btn">&times;</label>
                    <form action="content/makanan/act_edit_makanan.php" method="post">
                        <h3>Edit Makanan</h3>
                        <input type="hidden" name="id_makanan" value="<?= $row['id_makanan'] ?>">

                        <label>Nama Makanan</label>
                        <input type="text" name="nama_makanan" value="<?= $row['nama_makanan'] ?>" required>

                        <label>Nama Restoran</label>
                        <select name="id_resto" class="form-control" required>
                            <option value="">Pilih Restoran</option>
                            <?php
                            mysqli_data_seek($data_resto, 0);
                            while ($resto = mysqli_fetch_array($data_resto)) {
                                $selected = ($resto['id_resto'] == $row['id_resto']) ? 'selected' : '';
                                echo "<option value='{$resto['id_resto']}' $selected>{$resto['nama_resto']}</option>";
                            }
                            ?>
                        </select>

                        <label>Harga</label>
                        <input type="text" name="harga" value="<?= $row['harga'] ?>" required>

                        <button type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </table>
</div>
