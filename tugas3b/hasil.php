<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas 3B - Hasil Biodata</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #eeeeee;
        padding: 20px;
    }

    .result-box {
        width: 300px;
        margin: auto;
        background-color: white;
        padding: 15px;
        border: 1px solid #ccc;
    }

    table {
        width: 100%;
        margin-top: 10px;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid #999;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: green;
        color: white;
    }
    .error {
        color: red;
        text-align: center;
    }
    .btn-back {
        display: inline-block;
        margin-top: 10px;
        padding: 8px;
        background-color: gray;
        color: white;
        text-decoration: none;
    }
    .btn-back:hover {
        background-color: darkgray;
    }
    </style>
</head>
<body>

<div class="result-box">
    <h2>Hasil Biodata</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi input wajib
        $nama = $_POST['nama'] ?? '';
        $nim = $_POST['nim'] ?? '';
        $email = $_POST['email'] ?? '';
        $telepon = $_POST['telepon'] ?? '';
        $alamat = $_POST['alamat'] ?? '';
        $jk = $_POST['jk'] ?? '';
        $hobi = isset($_POST['hobi']) ? $_POST['hobi'] : [];
        $jurusan = $_POST['jurusan'] ?? '';

        if (empty($nama) || empty($nim) || empty($email) || empty($telepon) || empty($alamat) || empty($jk) || empty($jurusan)) {
            echo "<p class='error'>Peringatan: Semua field wajib diisi!</p>";
        } else {
            // Tampilkan Tabel
            echo "<table>";
            echo "<tr><th>Nama</th><td>$nama</td></tr>";
            echo "<tr><th>NIM</th><td>$nim</td></tr>";
            echo "<tr><th>Email</th><td>$email</td></tr>";
            echo "<tr><th>Telepon</th><td>$telepon</td></tr>";
            echo "<tr><th>Alamat</th><td>$alamat</td></tr>";
            echo "<tr><th>Jenis Kelamin</th><td>$jk</td></tr>";
            echo "<tr><th>Hobi</th><td>" . implode(", ", $hobi) . "</td></tr>";
            echo "<tr><th>Jurusan</th><td>$jurusan</td></tr>";
            echo "</table>";
        }

        // Fitur Bonus: Tombol Kembali dengan data tetap terisi
        $hobi_str = implode(",", $hobi);
        $query_string = http_build_query([
            'nama' => $nama, 'nim' => $nim, 'email' => $email, 
            'telepon' => $telepon, 'alamat' => $alamat, 
            'jk' => $jk, 'hobi' => $hobi_str, 'jurusan' => $jurusan
        ]);

        echo "<a href='form.php?$query_string' class='btn-back'>&laquo; Kembali ke Form</a>";
    } else {
        echo "<p class='error'>Akses langsung tidak diizinkan.</p>";
    }
    ?>
</div>

</body>
</html>