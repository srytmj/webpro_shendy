<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengeluaran</title>
</head>
<body>

<h2>Data Pengeluaran</h2>

<!-- form tambah data -->
<h3>Tambah Data Pengeluaran</h3>
<form method="post" action="<?php echo site_url('pengeluaran/add'); ?>">
    <label for="tanggal">Tanggal:</label>
    <input type="date" name="tanggal" required><br>

    <label for="biaya_pengeluaran">Akun Pengeluaran:</label>
    <select name="biaya_pengeluaran" required>
        <option value="" disabled selected>-- Pilih Akun Pengeluaran --</option>
        <?php foreach ($akun_data as $akun) : ?>
            <option value="<?php echo $akun->nama_akun; ?>"><?php echo $akun->nama_akun; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="keterangan">Keterangan:</label>
    <select name="keterangan" required>
        <option value="" disabled selected>-- Pilih Keterangan --</option>
        <option value="Pemesanan">Pemesanan</option>
        <option value="Pengeluaran">Pengeluaran</option>
    </select><br>

    <label for="jumlah">Jumlah:</label>
    <input type="text" name="jumlah" required><br>

    <button type="submit">Simpan</button>
</form>

<!-- tabel data pengeluaran -->
<table border="1">
    <tr>
        <th>ID Pengeluaran</th>
        <th>Tanggal</th>
        <th>Biaya Pengeluaran</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
        <th>Aksi</th> 
    </tr>
    <?php foreach ($pengeluaran as $row) : ?>
        <tr>
            <td><?php echo $row->id_pengeluaran; ?></td>
            <td><?php echo $row->tanggal; ?></td>
            <td><?php echo $row->biaya_pengeluaran; ?></td>
            <td><?php echo $row->keterangan; ?></td>
            <td><?php echo $row->jumlah; ?></td>
            <td>
                <a href="<?php echo site_url('pengeluaran/edit/' . $row->id_pengeluaran); ?>">Edit</a>
                <a href="<?php echo site_url('pengeluaran/delete/' . $row->id_pengeluaran); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
