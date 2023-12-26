<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengeluaran</title>
</head>
<body>
<h2>Edit Pengeluaran</h2>
<form method="post" action="<?php echo site_url('pengeluaran/update/' . $pengeluaran_detail->id_pengeluaran); ?>">
    <label for="tanggal">Tanggal:</label>
    <input type="date" name="tanggal" value="<?php echo $pengeluaran_detail->tanggal; ?>" required>
    <br>

    <label for="biaya_pengeluaran">Akun Pengeluaran:</label>
    <select name="biaya_pengeluaran" required>
        <option value="" disabled>-- Pilih Akun Pengeluaran --</option>
        <?php foreach ($akun_data as $akun) : ?>
            <option value="<?php echo $akun->nama_akun; ?>" <?php echo ($pengeluaran_detail->biaya_pengeluaran == $akun->nama_akun) ? 'selected' : ''; ?>><?php echo $akun->nama_akun; ?></option>
        <?php endforeach; ?>
    </select>
    <br>

    <label for="keterangan">Keterangan:</label>
    <select name="keterangan" required>
        <option value="" disabled>-- Pilih Keterangan --</option>
        <option value="Pemesanan" <?php echo ($pengeluaran_detail->keterangan == 'Pemesanan') ? 'selected' : ''; ?>>Pemesanan</option>
        <option value="Pengeluaran" <?php echo ($pengeluaran_detail->keterangan == 'Pengeluaran') ? 'selected' : ''; ?>>Pengeluaran</option>
    </select>
    <br>

    <label for="jumlah">Jumlah:</label>
    <input type="text" name="jumlah" value="<?php echo $pengeluaran_detail->jumlah; ?>" required>
    <br>

    <button type="submit">Update</button>
</form>

</body>
</html>
