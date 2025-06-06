<?php
include '././connection/conn.php';

// Ambil data untuk dropdown
$data_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
$data_makanan = mysqli_query($conn, "SELECT * FROM makanan");

// Ambil data untuk tabel pesanan (yang sebelumnya bernama detail_pesan)
$data_pesanan = mysqli_query($conn, "
    SELECT 
        p.id_pesanan,
        p.OrderDate,
        pl.id_pelanggan,
        pl.nama_pelanggan,
        m.nama_makanan,
        m.harga,
        p.jumlah,
        (m.harga * p.jumlah) AS total
    FROM pesanan p
    JOIN pelanggan pl ON p.id_pelanggan = pl.id_pelanggan
    JOIN makanan m ON p.id_makanan = m.id_makanan
");

$no = 1;
?>

<link rel="stylesheet" href="../../css/content-style.css">

<div class="container">
    <div class="content">
        <h4>Data Pesanan</h4>
    </div>
</div>

<div class="tambah-data">
    <div class="content">
        <form action="content/pesanan/act_pesanan.php" method='post'>
            <h4>Tambah Pesanan</h4>
            <label>Nama Pelanggan</label>
            <select name="id_pelanggan" class=form-control required>
                <option value="">Pilih Pelanggan</option>
                <?php while ($pl = mysqli_fetch_array($data_pelanggan)) { ?>
                    <option value="<?= $pl['id_pelanggan'] ?>">
                        <?= $pl['nama_pelanggan'] ?>
                    </option>
                <?php } ?>
            </select>
            <label>Tanggal Pesan</label>
            <input type="date" name="OrderDate" required>
            <label>Nama Makanan</label>
            <select name="id_makanan" class=form-control required>
                <option value="">Pilih Makanan</option>
                <?php while ($mk = mysqli_fetch_array($data_makanan)) { ?>
                    <option value="<?= $mk['id_makanan'] ?>">
                        <?= $mk['nama_makanan'] ?>
                    </option>
                <?php } ?>
            </select>
            <label>Jumlah</label>
            <input type="number" name="jumlah" min="1" placeholder="Masukkan jumlah" required>
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
            <th>ID Pesanan</th>
            <th>Tanggal Pesan</th>
            <th>ID Pelanggan</th>
            <th>Nama Makanan</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Tools</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($data_pesanan)) { 
            $modalId = 'modal-' . $row['id_pesanan'];?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['id_pesanan'] ?></td>
            <td><?= $row['OrderDate'] ?></td>
            <td><?= $row['nama_pelanggan'] ?></td>
            <td><?= $row['nama_makanan'] ?></td>
            <td><?= "Rp." . number_format($row['harga']) ?></td>
            <td><?= "Rp." . number_format($row['total']) ?></td>
            <td>
                <div class="tool-buttons">
                    <label for="<?= $modalId ?>" class="btn-edit">Edit</label>
                    <a href="content/pesanan/delete_pesanan.php?id=<?= $row['id_pesanan'] ?>" class="btn-delete" onclick="return confirm('Yakin ingin hapus data?')">Hapus</a>
                </div>
            </td>
        </tr>
        <!-- Modal Edit -->
        <input type="checkbox" id="<?= $modalId ?>" class="modal-toggle" hidden>
        <div class="modal-overlay">
            <div class="modal-box">
                <label for="<?= $modalId ?>" class="close-btn">&times;</label>
                <form action="content/pesanan/act_edit_pesanan.php" method="post">
                    <h3>Edit Pesanan</h3>
                    <input type="hidden" name="id_pesanan" value="<?= $row['id_pesanan'] ?>">

                    <label>Nama Pelanggan</label>
                    <select name="id_pelanggan" class=form-control required>
                        <option value="">Pilih Pelanggan</option>
                        <?php
                        mysqli_data_seek($data_pelanggan, 0);
                        while ($plg = mysqli_fetch_array($data_pelanggan)) {
                            $selected = ($plg['id_pelanggan'] == $row['id_pelanggan']) ? 'selected' : '';
                            echo "<option value='{$plg['id_pelanggan']}' $selected>{$plg['id_pelanggan']} - {$plg['nama_pelanggan']}</option>";
                        }
                        ?>
                    </select>

                    <label>Tanggal Pesan</label>
                    <input type="date" name="OrderDate" value="<?= $row['OrderDate'] ?>" required>

                    <label>Nama Makanan</label>
                    <select name="id_makanan" class=form-control required>
                        <option value="">Pilih Makanan</option>
                        <?php
                        mysqli_data_seek($data_makanan, 0);
                        while ($mkn = mysqli_fetch_array($data_makanan)) {
                            $selected = ($mkn['nama_makanan'] == $row['nama_makanan']) ? 'selected' : '';
                            echo "<option value='{$mkn['id_makanan']}' $selected>{$mkn['id_makanan']} - {$mkn['nama_makanan']}</option>";
                        }
                        ?>
                    </select>

                    <label>Jumlah</label>
                    <input type="number" name="jumlah" min="1" value="<?= $row['jumlah'] ?>" required>

                    <button type="submit">Simpan</button>
                </form>
            </div>
        </div>

        <?php } ?>
    </table>
</div>
