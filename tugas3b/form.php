<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas 3B - Input Biodata</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #eeeeee;
        padding: 20px;
    }
    .container {
        width: 300px;
        margin: auto;
        background-color: white;
        padding: 20px;
        border: 1px solid #ccc;
    }
    h2 {
        text-align: center;
        color: black;
    }
    label {
        display: block;
        margin-top: 10px;
    }

    input, select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 10px;
        border: 1px solid #999;
    }

    .radio-group, .checkbox-group {
        margin-bottom: 10px;
    }

    .btn-submit {
        width: 100%;
        padding: 10px;
        background-color: purple;
        color: white;
        border: none;
    }

    .btn-submit:hover {
        background-color: darkblue;
    }
    </style>
</head>
<body>

<?php
$data = $_GET;
$hobi_lama = isset($data['hobi']) ? explode(",", $data['hobi']) : [];
?>

<div class="container">
    <h2>Form Biodata</h2>
    <form action="hasil.php" method="POST">
        <label>Nama Lengkap:</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?? '' ?>" required>

        <label>NIM:</label>
        <input type="text" name="nim" value="<?= $data['nim'] ?? '' ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= $data['email'] ?? '' ?>" required>

        <label>Telepon:</label>
        <input type="tel" name="telepon" value="<?= $data['telepon'] ?? '' ?>" required>

        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?= $data['alamat'] ?? '' ?>" required>

        <label>Jenis Kelamin:</label>
        <div class="radio-group">
            <input type="radio" name="jk" value="Laki-laki" <?= (isset($data['jk']) && $data['jk'] == 'Laki-laki') ? 'checked' : '' ?> required> Laki-laki
            <input type="radio" name="jk" value="Perempuan" <?= (isset($data['jk']) && $data['jk'] == 'Perempuan') ? 'checked' : '' ?> required> Perempuan
        </div>

        <label>Hobi (Bisa pilih banyak):</label>
        <div class="checkbox-group">
            <input type="checkbox" name="hobi[]" value="Coding" <?= in_array('Coding', $hobi_lama) ? 'checked' : '' ?>> Coding
            <input type="checkbox" name="hobi[]" value="Gaming" <?= in_array('Gaming', $hobi_lama) ? 'checked' : '' ?>> Gaming
            <input type="checkbox" name="hobi[]" value="Musik" <?= in_array('Musik', $hobi_lama) ? 'checked' : '' ?>> Musik
        </div>

        <label>Jurusan:</label>
        <select name="jurusan" required>
            <option value="">-- Pilih Jurusan --</option>
            <option value="Teknik Informatika" <?= (isset($data['jurusan']) && $data['jurusan'] == 'Teknik Informatika') ? 'selected' : '' ?>>Teknik Informatika</option>
            <option value="Sistem Informasi" <?= (isset($data['jurusan']) && $data['jurusan'] == 'Sistem Informasi') ? 'selected' : '' ?>>Sistem Informasi</option>
            <option value="Teknik Komputer" <?= (isset($data['jurusan']) && $data['jurusan'] == 'Teknik Komputer') ? 'selected' : '' ?>>Teknik Komputer</option>
            <option value="Manajemen Informatika" <?= (isset($data['jurusan']) && $data['jurusan'] == 'Manajemen Informatika') ? 'selected' : '' ?>>Manajemen Informatika</option>
        </select>

        <button type="submit" class="btn-submit">Tampilkan Hasil</button>
    </form>
</div>

</body>
</html>